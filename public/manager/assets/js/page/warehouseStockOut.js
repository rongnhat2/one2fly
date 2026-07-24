const ViewStockOut = {
    canExport: true,
    table: {
        // Hàm tạo một hàng dữ liệu cho bảng danh sách nhập kho
        __generateDTRow(data) {
            return [
                `<div class="id-order">${data.id}</div>`,
                data.note,
                data.supplier_name ?? "Toàn bộ chi nhánh",
                data.branch_name ?? "Toàn bộ chi nhánh",
                IndexView.Config.formatPrices(data.total_amount) + " đ",
                data.import_date,
                data.status == 1
                    ? "<span class='badge badge-success'>Đã xác nhận</span>"
                    : "<span class='badge badge-danger'>Chưa xác nhận</span>",
                `<div class="view-data tab-action" atr="StockOutView" style="cursor: pointer" data-id="${data.id}" data-order-id="${data.note}" data-order-status="${data.status}"><i class="anticon anticon-eye"></i></div>`,
            ];
        },
        __generateDTRowDetail(data) {
            if (data.quantity > data.quantity_stock)
                ViewStockOut.canExport = false;
            return [
                `<div class="d-flex">
                    <div class="avatar avatar-image m-r-15">
                        <img src="/${data.product_images.split(",")[0]}" alt="">
                    </div>
                    <div>
                        <h5 class="m-b-0 text-dark"> ${data.product_name} 
                        </h5>  
                    </div>
                </div>`,
                IndexView.Config.formatPrices(data.quantity),
                `<p class="m-b-0 text-gray ">  
                            ${(() => {
                                let noteObj;
                                try {
                                    noteObj = JSON.parse(data.note);
                                } catch (e) {
                                    noteObj = {};
                                }
                                return `Size: ${noteObj.product_size ?? ""} `;
                            })()}
                        </p> `,
                data.quantity_stock,
            ];
        },
        // Hàm khởi tạo cấu trúc tiêu đề cột của bảng danh sách nhập kho
        init() {
            var row_table = [
                {
                    title: "ID",
                    name: "name",
                    orderable: true,
                    width: "5%",
                },
                {
                    title: "Mã đơn hàng",
                    name: "supplier_name",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Nhà cung cấp",
                    name: "supplier_name",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Chi nhánh",
                    name: "branch_name",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Giá trị",
                    name: "total_amount",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Ngày nhận thông tin",
                    name: "import_date",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Trạng thái",
                    name: "import_date",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Hành động",
                    name: "Action",
                    orderable: false,
                    width: "5%",
                },
            ];
            IndexView.table.init("#data-table-stock-out", row_table);
        },
        initDetail() {
            ViewStockOut.canExport = true;
            // Destroy table cũ nếu đã tồn tại
            if (
                $("#data-table-stock-out-view").length &&
                $.fn.DataTable.isDataTable("#data-table-stock-out-view")
            ) {
                $("#data-table-stock-out-view").DataTable().destroy();
            }

            var row_table_detail = [
                {
                    title: "Sản phẩm",
                    name: "product_name",
                    orderable: true,
                    width: "20%",
                },
                {
                    title: "Số lượng",
                    name: "product_quantity",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Size",
                    name: "product_quantity",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Số lượng trong kho",
                    name: "product_quantity",
                    orderable: true,
                    width: "10%",
                },
            ];
            IndexView.table.init(
                "#data-table-stock-out-view",
                row_table_detail
            );
        },
    },
    Layout: {
        FormCreate: "",
        FormTable: "",
        FormView: "",
        // Hàm khởi tạo dữ liệu layout cho tạo mới và bảng danh sách nhập kho
        init() {
            ViewStockOut.Layout.FormCreate = $(
                ".layout-tab-stock-out-create"
            ).html();
            ViewStockOut.Layout.FormTable = $(
                ".layout-tab-stock-out-table"
            ).html();
            ViewStockOut.Layout.FormView = $(
                ".layout-tab-stock-out-view"
            ).html();
            $(".layout-tab-stock-out-create").remove();
            $(".layout-tab-stock-out-table").remove();
            $(".layout-tab-stock-out-view").remove();
        },
    },
    FullTab: {
        Create: {
            // Hàm thiết lập giá trị cho form tạo mới (chưa sử dụng)
            setVal(resource, data) {},
            // Hàm lấy giá trị dữ liệu các dòng sản phẩm đang nhập
            getVal() {
                let dataList = [];
                $(`.item-insert-warehouse`).each(function () {
                    let product =
                        $(this).find("select[data-product]").val() || "";
                    let quantity =
                        $(this).find("input[data-quantity]").val() || "";
                    let price = $(this).find("input[data-price]").val() || "";
                    let total = $(this).find("input[data-total]").val() || "";
                    let metadata =
                        $(this).find("select[data-metadata]").val() || "";
                    if (product || quantity || price || total || metadata) {
                        dataList.push({
                            product: product,
                            quantity: quantity,
                            price: price,
                            total: total,
                            metadata: metadata,
                        });
                    }
                });

                // Kiểm tra bắt buộc phải có ít nhất 1 sản phẩm
                if (dataList.length == 0) {
                    IndexView.helper.showToastError(
                        "Error",
                        "Phải có ít nhất một sản phẩm."
                    );
                    return false;
                }
                // Kiểm tra bắt buộc ngày nhập phải được chọn
                if ($(`.data-date`).val() == "") {
                    IndexView.helper.showToastError("Error", "Chọn ngày nhập.");
                    return false;
                }

                var fd = new FormData();
                fd.append("branch_id", $(`.data-branch`).val());
                fd.append("supplier_id", $(`.data-supplier`).val());
                fd.append("date", $(`.data-date`).val());
                fd.append("total", $(`.data-total`).val());
                fd.append("metadata", JSON.stringify(dataList));
                return fd;
            },
            // Hàm khởi tạo giao diện tạo mới
            init(name) {
                $(`[data-tab-name=${name}]`).html(
                    ViewStockOut.Layout.FormCreate
                );
            },
        },
        View: {
            order_id: 0,
            // Hàm thiết lập dữ liệu cho form cập nhật
            setVal(resource, data) {},
            // Hàm lấy dữ liệu từ form cập nhật, kiểm tra dữ liệu bắt buộc
            getVal(resource) {},
            // Hàm khởi tạo giao diện form cập nhật
            init(name) {
                $(`[data-tab-name=${name}]`).html(ViewStockOut.Layout.FormView);
            },
        },
        Table: {
            // Hàm render layout bảng danh sách hàng nhập kho
            init(name) {
                $(`[data-tab-name=${name}]`).html(
                    ViewStockOut.Layout.FormTable
                );
            },
        },
        // Hàm lắng nghe sự kiện nhấn nút ở tab và gọi callback theo tên tab
        onPush(name, resource, callback) {
            $(document).on(
                "click",
                `${resource} .full-tab-action`,
                function () {
                    $(this).attr("atr").trim();
                    if ($(this).attr("atr").trim() == name) {
                        callback();
                    }
                }
            );
        },
        onChangeStatus(callback) {
            $(document).on("click", `.full-tab-action`, function () {
                let id = $(this).attr("data-status-id");
                let name = $(this).attr("atr").trim();
                if (name == "UpdateStatus") {
                    callback(id);
                }
            });
        },
        // Hàm reset HTML nội dung của tab cụ thể
        default(name) {
            $(`[data-tab-name=${name}]`).html("");
        },
        // Hàm hiển thị tab tương ứng, ẩn các tab còn lại
        doShow(name) {
            $("#export-stock .warehouse-layout").removeClass("showing");
            $(`[data-tab-name=${name}] .warehouse-layout`).addClass("showing");
        },
        // Hàm lắng nghe sự kiện chuyển tab và gọi callback kèm ID (nếu có)
        onShow(name, callback) {
            $(document).on("click", `.tab-action`, function () {
                if ($(this).attr("atr").trim() == name) {
                    var id = $(this).attr("data-id");
                    var order_id = $(this).attr("data-order-id");
                    var order_status = $(this).attr("data-order-status");
                    callback(id, order_id, order_status);
                }
            });
        },
    },
    // Hàm khởi tạo toàn bộ module nhập kho (Gọi khi load trang)
    init() {
        ViewStockOut.Layout.init();
    },
};
(() => {
    // Hàm khởi tạo dữ liệu trang nhập kho, load dữ liệu cần thiết
    async function init() {
        await ViewStockOut.init();
        await getStockOutTable();
    }

    // Hàm lấy dữ liệu bảng danh sách phiếu nhập, render giao diện
    async function getStockOutTable() {
        await ViewStockOut.FullTab.Table.init("StockOutTable");
        await ViewStockOut.FullTab.doShow("StockOutTable");
        await ViewStockOut.table.init();
        await getStockOut();
    }

    // Lắng nghe chuyển sang tab danh sách phiếu nhập kho
    ViewStockOut.FullTab.onShow("StockOutTable", async () => {
        await getStockOutTable();
    });
    // Lắng nghe chuyển sang tab tạo phiếu nhập kho
    ViewStockOut.FullTab.onShow(
        "StockOutView",
        async (id, order_id, order_status) => {
            ViewStockOut.FullTab.View.init("StockOutView");
            ViewStockOut.FullTab.doShow("StockOutView");
            ViewStockOut.FullTab.View.order_id = order_id;
            // Đợi một chút để DOM được render
            await ViewStockOut.table.initDetail();
            await getStockInDetail(id);
            console.log(order_status);
            $(".status-action").html(``);
            if (order_status == 0 && ViewStockOut.canExport) {
                $(".status-action").html(` 
                        <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="5">
                            <i class=" anticon anticon-check-circle"></i> Xác nhận xuất kho
                        </button>
                    `);
            }
        }
    );

    // hàm xác nhận xuất kho
    ViewStockOut.FullTab.onChangeStatus((status) => {
        Api.Order.updateStatus(ViewStockOut.FullTab.View.order_id, status)
            .done((res) => {
                IndexView.helper.showToastSuccess("Success", "Thành công");
                ViewStockOut.FullTab.doShow("StockOutTable");
                getStockOutTable();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });

    // Hàm lấy toàn bộ phiếu nhập kho và render vào bảng
    async function getStockOut() {
        return Api.Warehouse.StockOutGetAll()
            .done((res) => {
                IndexView.table.clearRows();
                Object.values(res.data).map((v) => {
                    IndexView.table.insertRow(
                        ViewStockOut.table.__generateDTRow(v)
                    );
                    IndexView.table.render();
                });
                IndexView.table.render();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    // Hàm lấy toàn bộ chi tiết phiếu nhập kho và render vào bảng
    async function getStockInDetail(id) {
        return Api.Warehouse.StockInGetDetail(id)
            .done((res) => {
                IndexView.table.clearRows();
                Object.values(res.data).map((v) => {
                    console.log(IndexView.table);
                    IndexView.table.insertRow(
                        ViewStockOut.table.__generateDTRowDetail(v)
                    );
                    IndexView.table.render();
                });
                IndexView.table.render();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    // Gọi khởi tạo trang nhập kho khi load
    init();
})();
