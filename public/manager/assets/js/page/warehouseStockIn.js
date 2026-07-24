const ViewStockIn = {
    Supplier: [],
    Branch: [],
    Product: [],
    table: {
        // Hàm tạo một hàng dữ liệu cho bảng danh sách nhập kho
        __generateDTRow(data) {
            return [
                `<div class="id-order">${data.id}</div>`,
                data.supplier_name,
                data.branch_name,
                IndexView.Config.formatPrices(data.total_amount) + " đ",
                data.import_date,
                `<div class="view-data tab-action" atr="StockInView" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-eye"></i></div>`,
            ];
        },
        __generateDTRowDetail(data) {
            return [
                `<div class="d-flex">
                    <div class="avatar avatar-image m-r-15">
                        <img src="/${data.product_images.split(",")[0]}" alt="">
                    </div>
                    <div>
                        <h5 class="m-b-0 text-dark"> ${data.product_name} 
                        </h5>
                        <p class="m-b-0 text-gray ">  ${data.note} 
                        </p> 
                    </div>
                </div>`,
                IndexView.Config.formatPrices(data.unit_price) + " đ",
                IndexView.Config.formatPrices(data.quantity),
                IndexView.Config.formatPrices(data.total_price) + " đ",
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
                    title: "Ngày nhập",
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
            IndexView.table.init("#data-table-stock-in", row_table);
        },
        initDetail() {
            // Destroy table cũ nếu đã tồn tại
            if (
                $("#data-table-stock-in-view").length &&
                $.fn.DataTable.isDataTable("#data-table-stock-in-view")
            ) {
                $("#data-table-stock-in-view").DataTable().destroy();
            }

            var row_table_detail = [
                {
                    title: "Sản phẩm",
                    name: "product_name",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Giá nhập",
                    name: "product_price",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Số lượng",
                    name: "product_quantity",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Tổng tiền",
                    name: "product_quantity",
                    orderable: true,
                    width: "10%",
                },
            ];
            IndexView.table.init("#data-table-stock-in-view", row_table_detail);
        },
    },
    StockIn: {
        // Hàm render dữ liệu supplier và branch ra selector trên giao diện nhập kho
        render() {
            ViewStockIn.Supplier.map((v) => {
                $(`.data-supplier`).append(
                    `<option value="${v.id}">${v.name}</option>`
                );
            });
            ViewStockIn.Branch.map((v) => {
                $(`.data-branch`).append(
                    `<option value="${v.id}">${v.name}</option>`
                );
            });
        },
        // Hàm tạo template cho từng dòng nhập sản phẩm trong bảng nhập kho
        itemTemplate(count, data) {
            return `<tr class="item-insert-warehouse">
                        <td>
                            <select class="form-control" data-product>
                                <option value="0">-- Chọn sản phẩm --</option>
                                ${ViewStockIn.Product.map(
                                    (item) =>
                                        `<option value="${item.id}">${item.name}</option>`
                                ).join("")}
                            </select>
                        </td>
                        <td>
                            <select class="form-control" data-metadata> </select>
                        </td>
                        <td><input type="number" class="form-control" data-quantity value="0"></td>
                        <td><input type="number" class="form-control" data-price value="0"></td>
                        <td><input type="text" class="form-control" data-total value="0" disabled></td> 
                        <td><button class="btn btn-danger btn-sm delete-item-insert-warehouse"><i class="anticon anticon-delete"></i></button></td>
                    </tr>`;
        },
        // Hàm xử lý khi có thay đổi số lượng hoặc giá sản phẩm theo dòng
        onChangeItem(index) {
            let quantity =
                $(`.stock-in-table tbody tr`)
                    .eq(index)
                    .find("input[data-quantity]")
                    .val() || "";
            let price =
                $(`.stock-in-table tbody tr`)
                    .eq(index)
                    .find("input[data-price]")
                    .val() || "";
            let total = quantity * price;
            $(`.stock-in-table tbody tr`)
                .eq(index)
                .find("input[data-total]")
                .val(total);
            ViewStockIn.StockIn.setPricesTotal();
        },
        // Hàm gán sự kiện onchange cho selector chọn sản phẩm để callback render metadata sản phẩm
        onChangeProduct(callback) {
            $(document).on("change", "select[data-product]", function () {
                let product_id = $(this).val();
                if (product_id != 0) {
                    callback(product_id, $(this).closest("tr").index());
                }
            });
        },
        // Hàm render metadata(kích thước/option) cho sản phẩm đã chọn vào selector dòng đang xử lý
        onRenderProductMetadata(index, metadata) {
            $(`.stock-in-table tbody tr`)
                .eq(index)
                .find("select[data-metadata] option")
                .remove();
            let metadataArr = JSON.parse(metadata);
            metadataArr.map((v) => {
                if (v.status == 1) {
                    $(`.stock-in-table tbody tr`)
                        .eq(index)
                        .find("select[data-metadata]")
                        .append(
                            `<option value="${v.title} - ${v.size}">${v.title} - ${v.size}</option>`
                        );
                }
            });
        },
        // Hàm tính tổng giá trị của tất cả các dòng sản phẩm đang nhập
        setPricesTotal() {
            let total = 0;
            $(`.stock-in-table tbody tr`).each(function () {
                total += parseInt($(this).find("input[data-total]").val() || 0);
            });
            $(`.data-total`).val(total);
        },
        // Hàm thêm 1 dòng sản phẩm nhập mới vào bảng
        insertItem() {
            var item = ViewStockIn.StockIn.itemTemplate(0, null);
            $(".stock-in-table  tbody").append(item);
        },
        // Hàm xóa 1 dòng sản phẩm nhập theo chỉ số index
        removeItem(index) {
            $(".stock-in-table tbody tr").eq(index).remove();
        },
        // Hàm lắng nghe sự kiện tạo phiếu nhập kho, gọi callback
        onCreateStockIn(callback) {
            $(document).on("click", `.create-stock-in`, function () {
                callback();
            });
        },
        // Hàm khởi tạo các sự kiện, render dữ liệu cho giao diện nhập kho
        init() {
            $(document).on(
                "click",
                ".create-item-insert-warehouse",
                function () {
                    ViewStockIn.StockIn.insertItem();
                }
            );
            $(document).on(
                "click",
                ".delete-item-insert-warehouse",
                function () {
                    ViewStockIn.StockIn.removeItem(
                        $(this).closest("tr").index()
                    );
                }
            );
            $(document).on("keyup", "input[data-quantity]", function () {
                ViewStockIn.StockIn.onChangeItem($(this).closest("tr").index());
            });
            $(document).on("keyup", "input[data-price]", function () {
                ViewStockIn.StockIn.onChangeItem($(this).closest("tr").index());
            });
            ViewStockIn.StockIn.render();
            ViewStockIn.StockIn.setPricesTotal();
        },
    },
    Layout: {
        FormCreate: "",
        FormTable: "",
        FormView: "",
        // Hàm khởi tạo dữ liệu layout cho tạo mới và bảng danh sách nhập kho
        init() {
            ViewStockIn.Layout.FormCreate = $(
                ".layout-tab-stock-in-create"
            ).html();
            ViewStockIn.Layout.FormTable = $(
                ".layout-tab-stock-in-table"
            ).html();
            ViewStockIn.Layout.FormView = $(".layout-tab-stock-in-view").html();
            $(".layout-tab-stock-in-create").remove();
            $(".layout-tab-stock-in-table").remove();
            $(".layout-tab-stock-in-view").remove();
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
                    ViewStockIn.Layout.FormCreate
                );
            },
        },
        View: {
            // Hàm thiết lập dữ liệu cho form cập nhật
            setVal(resource, data) {},
            // Hàm lấy dữ liệu từ form cập nhật, kiểm tra dữ liệu bắt buộc
            getVal(resource) {},
            // Hàm khởi tạo giao diện form cập nhật
            init(name) {
                $(`[data-tab-name=${name}]`).html(ViewStockIn.Layout.FormView);
            },
        },
        Table: {
            // Hàm render layout bảng danh sách hàng nhập kho
            init(name) {
                $(`[data-tab-name=${name}]`).html(ViewStockIn.Layout.FormTable);
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
        // Hàm reset HTML nội dung của tab cụ thể
        default(name) {
            $(`[data-tab-name=${name}]`).html("");
        },
        // Hàm hiển thị tab tương ứng, ẩn các tab còn lại
        doShow(name) {
            $(`#import-stock .warehouse-layout`).removeClass("showing");
            $(`[data-tab-name=${name}] .warehouse-layout`).addClass("showing");
        },
        // Hàm lắng nghe sự kiện chuyển tab và gọi callback kèm ID (nếu có)
        onShow(name, callback) {
            $(document).on("click", `.tab-action`, function () {
                if ($(this).attr("atr").trim() == name) {
                    var id = $(this).attr("data-id");
                    callback(id);
                }
            });
        },
    },
    // Hàm khởi tạo toàn bộ module nhập kho (Gọi khi load trang)
    init() {
        ViewStockIn.StockIn.init();
        ViewStockIn.Layout.init();
    },
};
(() => {
    // Hàm khởi tạo dữ liệu trang nhập kho, load dữ liệu cần thiết
    async function init() {
        await getSupplier();
        await getBranch();
        await getProduct();

        await ViewStockIn.init();

        await getStockInTable();
    }

    // Hàm lấy dữ liệu bảng danh sách phiếu nhập, render giao diện
    async function getStockInTable() {
        await ViewStockIn.FullTab.Table.init("StockInTable");
        await ViewStockIn.FullTab.doShow("StockInTable");
        await ViewStockIn.table.init();
        await getStockIn();
    }

    // Lắng nghe chuyển sang tab danh sách phiếu nhập kho
    ViewStockIn.FullTab.onShow("StockInTable", async () => {
        await getStockInTable();
    });

    // Lắng nghe chuyển sang tab tạo phiếu nhập kho
    ViewStockIn.FullTab.onShow("StockInCreate", () => {
        ViewStockIn.FullTab.Create.init("StockInCreate");
        ViewStockIn.FullTab.doShow("StockInCreate");
    });

    // Lắng nghe sự kiện nhấn nút tạo phiếu nhập kho mới
    ViewStockIn.StockIn.onCreateStockIn(async () => {
        var fd = ViewStockIn.FullTab.Create.getVal();
        if (fd) {
            IndexView.helper.showToastProcessing("Process", "Đang xử lí");
            Api.Warehouse.StockInCreate(fd)
                .done(async (res) => {
                    IndexView.helper.showToastSuccess("Success", "Thành công");
                    await getStockInTable();
                })
                .fail((err) => {
                    IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
                })
                .always(() => {});
        }
    });

    // Lắng nghe chuyển sang tab tạo phiếu nhập kho
    ViewStockIn.FullTab.onShow("StockInView", async (id) => {
        ViewStockIn.FullTab.View.init("StockInView");
        ViewStockIn.FullTab.doShow("StockInView");
        // Đợi một chút để DOM được render
        await ViewStockIn.table.initDetail();
        await getStockInDetail(id);
    });

    // Lắng nghe thay đổi sản phẩm, lấy metadata sản phẩm và render vào selector tương ứng
    ViewStockIn.StockIn.onChangeProduct((product_id, index) => {
        Api.Product.getOne(product_id)
            .done((res) => {
                ViewStockIn.StockIn.onRenderProductMetadata(
                    index,
                    res.data.metadata
                );
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            });
    });

    // Hàm lấy toàn bộ sản phẩm (dùng cho selector)
    async function getProduct() {
        return Api.Product.GetAll()
            .done((res) => {
                ViewStockIn.Product = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    // Hàm lấy toàn bộ nhà cung cấp
    async function getSupplier() {
        return Api.Supplier.GetAll()
            .done((res) => {
                ViewStockIn.Supplier = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    // Hàm lấy toàn bộ chi nhánh
    async function getBranch() {
        return Api.Branch.GetAll()
            .done((res) => {
                ViewStockIn.Branch = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    // Hàm lấy toàn bộ phiếu nhập kho và render vào bảng
    async function getStockIn() {
        return Api.Warehouse.StockInGetAll()
            .done((res) => {
                IndexView.table.clearRows();
                Object.values(res.data).map((v) => {
                    IndexView.table.insertRow(
                        ViewStockIn.table.__generateDTRow(v)
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
                        ViewStockIn.table.__generateDTRowDetail(v)
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

    // Hàm debounce chuẩn để tránh gọi hàm thao tác liên tục, chỉ gọi sau 1 khoảng thời gian timeout
    function debounce(f, timeout) {
        let isLock = false;
        let timeoutID = null;
        return function (item) {
            if (!isLock) {
                f(item);
                isLock = true;
            }
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function () {
                isLock = false;
            }, timeout);
        };
    }
    // Gọi khởi tạo trang nhập kho khi load
    init();
})();
