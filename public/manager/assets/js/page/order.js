// Định nghĩa đối tượng View chứa các logic quản lý giao diện sản phẩm
const View = {
    Branch: {
        list: [],
        selected: 0,
    },
    StatusOrder: "0",
    Status: {
        Order(id) {
            let order_status = [
                "Chờ xác nhận",
                "Đã xác nhận",
                "Chưa hoàn thiện",
                "Đã hoàn thiện",
                "Đang lấy hàng",
                "Đang giao hàng",
                "Đã giao hàng",
                "Đã hoàn tất",
                "Đã hủy",
            ];
            return order_status[id];
        },
        OrderColor(id) {
            let order_status_color = [
                "cyan",
                "lime",
                "orange",
                "geekblue",
                "purple",
                "purple",
                "purple",
                "geekblue",
                "red",
            ];
            return order_status_color[id];
        },
        Payment(id) {
            let payment_status = ["Chưa thanh toán", "Đã thanh toán", "Đã hủy"];
            return payment_status[id];
        },
        PaymentColor(id) {
            let payment_status_color = ["red", "green"];
            return payment_status_color[id];
        },
        PaymentMethod(id) {
            let payment_method = [
                "Thanh toán online",
                "Thanh toán khi nhận hàng",
            ];
            return payment_method[id];
        },
        PaymentMethodColor(id) {
            let payment_method_color = ["green", "blue"];
            return payment_method_color[id];
        },
    },
    table: {
        // Tạo 1 dòng dữ liệu cho bảng sản phẩm
        __generateDTRow(data) {
            return [
                `<div class="id-order">${data.id}</div>`,
                `<div class=" ">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                        </div>
                        <div class="m-l-10 ">
                            <h6 class="m-b-0">${data.username}</h6>  
                            <p class="m-b-0 text-gray "> ${data.email} </p>
                        </div>
                    </div>
                </div>`,
                `<div class="d-flex align-items-center">
                    <span class="badge badge-secondary badge-dot m-r-10"></span>
                    <p style="width:80px"  class="m-b-0">Tạm tính: </p> ${IndexView.Config.formatPrices(
                        data.total_price
                    )} đ
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-warning badge-dot m-r-10"></span>
                    <p style="width:80px" class="m-b-0">Giảm giá: </p> ${IndexView.Config.formatPrices(
                        data.voucher_value
                    )} %
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-success badge-dot m-r-10"></span>
                    <p style="width:80px" class="m-b-0">Tổng tiền: </p> ${IndexView.Config.formatPrices(
                        data.real_price
                    )} đ
                </div>`,
                `<div class="d-flex align-items-center">
                    <span class="badge badge-primary badge-dot m-r-10"></span>
                    <p style="width: 120px" class="m-b-0">Phương thức: </p> <span class="badge badge-pill badge-${View.Status.PaymentMethodColor(
                        data.payment_method
                    )}">${View.Status.PaymentMethod(
                    data.payment_method
                )}</span> 
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-primary badge-dot m-r-10"></span>
                    <p style="width: 120px" class="m-b-0">Trạng thái: </p> <span class="badge badge-pill badge-${View.Status.PaymentColor(
                        data.payment_status
                    )}">${View.Status.Payment(data.payment_status)}</span>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-primary badge-dot m-r-10"></span>
                    <p style="width: 120px" class="m-b-0">Ngày thanh toán: </p> ${
                        data.payment_date
                    }
                </div>`,
                ` <div class="d-flex align-items-center">
                    <span class="badge badge-primary badge-dot m-r-10"></span>
                    <p style="width: 120px" class="m-b-0">Trạng thái: </p> <span class="badge badge-pill badge-${View.Status.OrderColor(
                        data.order_status
                    )}">${View.Status.Order(data.order_status)}</span>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-primary badge-dot m-r-10"></span>
                    <p style="width: 120px" class="m-b-0">Ngày đặt hàng: </p> ${
                        data.order_date
                    }
                </div>`,
                `<div class="view-data tab-action" atr="View" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-eye"></i></div> `,
            ];
        },
        // Khởi tạo cấu hình bảng sản phẩm
        init() {
            var row_table = [
                {
                    title: "ID",
                    name: "id",
                    orderable: true,
                    width: "5%",
                },
                {
                    title: "Khách hàng",
                    name: "username",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Giá trị đơn hàng",
                    name: "total_price",
                    orderable: true,
                    width: "8%",
                },
                {
                    title: "Thanh toán",
                    name: "payment_method",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Đơn hàng",
                    name: "order_date",
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
            IndexView.table.init("#data-table", row_table);
        },
    },
    Filter: {
        onChangeStatus(callback) {
            $(document).on("change", `#order-status`, function () {
                callback($(this).val());
            });
        },
    },
    Layout: {
        FormView: "",
        // Lưu lại template của các form khi khởi tạo và loại bỏ khỏi dom gốc
        init() {
            View.Layout.FormView = $(".layout-tab-view").html();
            $(".layout-tab-view").remove();
        },
    },
    URL: {
        setURL(filters) {
            const param = new URLSearchParams({ ...filters }).toString();
            window.history.pushState("", "", "?" + param);
        },
        getFilterURL() {
            // lấy ra url và trả về chuỗi filter tương ứng
            var urlParam = new URLSearchParams(window.location.search);
            return (filters = {
                status: urlParam.get("status") ?? "-1",
            });
        },
        get(id) {
            var urlParam = new URLSearchParams(window.location.search);
            return urlParam.get(id);
        },
    },
    FullTab: {
        View: {
            Product: [],
            Warehouse: [],
            Order: [],
            renderTableDetail(resource, data) {
                // Set order items
                // let orderItems = [];
                // if (data.order_value) {
                //     try {
                //         orderItems =
                //             typeof data.order_value === "string"
                //                 ? JSON.parse(data.order_value)
                //                 : data.order_value;
                //     } catch (e) {
                //         orderItems = [];
                //     }
                // }
                let itemsHtml = "";
                let order_status = 3;
                data.map((item, index) => {
                    let product = View.FullTab.View.Product.find(
                        (p) => p.id === item.product_id
                    );
                    let product_size = JSON.parse(product.metadata);
                    let product_size_item = product_size.find(
                        (p) => p.size === item.product_size
                    );

                    let metadata_slug = IndexView.Config.toSlug(
                        product_size_item.title + "-" + product_size_item.size
                    );
                    let warehouse_product = View.FullTab.View.Warehouse.find(
                        (p) =>
                            p.product_id === item.product_id &&
                            p.metadata_slug === metadata_slug
                    );
                    if (warehouse_product.in_warehouse < item.quantity)
                        View.StatusOrder = 2;

                    let total_price = product_size_item.price * item.quantity;
                    itemsHtml += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <div class="avatar avatar-image" style="height: 40px; min-width: 40px; max-width:40px">
                                                <img src="/${
                                                    product.images.split(",")[0]
                                                }" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="m-b-0">${
                                                product.name || "Sản phẩm"
                                            }</h6>
                                            <p class="m-b-0 text-muted"><small>Mã: ${
                                                product.id || ""
                                            }</small></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">${
                                    product_size_item.title || 0
                                } - ${product_size_item.size || 0}</td>
                                <td class="text-center">${
                                    item.quantity || 0
                                }</td>
                                <td class="text-center">${
                                    warehouse_product.in_warehouse ||
                                    `<span class="payment-status-badge badge badge-pill badge-red">Hết hàng</span>`
                                }</td>
                                <td class="text-right">${IndexView.Config.formatPrices(
                                    total_price
                                )} đ</td>
                                <td class="text-right">${
                                    item.discount_value || 0
                                }%</td>
                                <td class="text-right font-weight-semibold">${IndexView.Config.formatPrices(
                                    total_price -
                                        (total_price *
                                            (item.discount_value || 0)) /
                                            100
                                )} đ</td>
                            </tr>
                        `;
                });
                View.StatusOrder = order_status;

                $(".badge-status-order").text(
                    View.Status.Order(View.StatusOrder)
                );

                $(`${resource}`).find(".order-items-list").html(itemsHtml);
            },
            setValBranch() {
                $("#branch-select option").remove();
                $("#branch-select").append(
                    `<option value="0">Tất cả cơ sở</option>`
                );
                View.Branch.list.map((v) => {
                    $("#branch-select").append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
            },
            renderStatusAction() {
                $(".status-action").html(``);
                if (View.FullTab.View.Order.order_status == 0) {
                    $(".status-action").html(`
                        <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="1">
                            <i class=" anticon anticon-check-circle"></i> Xác nhận đơn hàng
                        </button>
                        <button class="btn btn-danger full-tab-action" atr="UpdateStatus" data-status-id="8">
                            <i class="anticon anticon-close-circle"></i> Hủy đơn hàng
                        </button>
                    `);
                } else if (View.FullTab.View.Order.order_status == 1) {
                    $(".status-action").html(`
                            <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="3">
                                <i class=" anticon anticon-check-circle"></i> Xác nhận đơn hàng đã hoàn thiện
                            </button> 
                        `);
                } else if (View.FullTab.View.Order.order_status == 2) {
                    $(".status-action").html(`
                            <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="3">
                                <i class=" anticon anticon-check-circle"></i> Xác nhận đơn hàng
                            </button>
                            <button class="btn btn-danger full-tab-action" atr="UpdateStatus" data-status-id="8">
                                <i class="anticon anticon-close-circle"></i> Hủy đơn hàng
                            </button>
                        `);
                } else if (View.FullTab.View.Order.order_status == 3) {
                    $(".status-action").html(`
                            <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="4">
                                <i class=" anticon anticon-check-circle"></i> Gửi yêu cầu xuất kho
                            </button> 
                        `);
                } else if (View.FullTab.View.Order.order_status == 5) {
                    $(".status-action").html(`
                            <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="6">
                                <i class=" anticon anticon-check-circle"></i> Đã giao hàng
                            </button> 
                        `);
                }
                // else if (View.FullTab.View.Order.order_status == 5) {
                //     $(".status-action").html(`
                //             <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="6">
                //                 <i class=" anticon anticon-check-circle"></i> Xác nhận đơn hàng
                //             </button>
                //             <button class="btn btn-danger full-tab-action" atr="UpdateStatus" data-status-id="8">
                //                 <i class="anticon anticon-close-circle"></i> Hủy đơn hàng
                //             </button>
                //         `);
                // }
                else if (View.FullTab.View.Order.order_status == 6) {
                    $(".status-action").html(`
                        <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="7">
                            <i class=" anticon anticon-check-circle"></i> Đã hoàn thiện
                        </button> 
                    `);
                }
                // } else if (View.FullTab.View.Order.order_status == 7) {
                //     $(".status-action").html(`
                //         <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="8">
                //             <i class=" anticon anticon-check-circle"></i> Xác nhận đơn hàng
                //         </button>
                //     `);
                // } else if (View.FullTab.View.Order.order_status == 8) {
                //     $(".status-action").html(`
                //         <button class="btn btn-primary mr-2 full-tab-action" atr="UpdateStatus" data-status-id="9">
                //             <i class=" anticon anticon-check-circle"></i> Xác nhận đơn hàng
                //         </button>
                //     `);
                // }
            },
            // Gán giá trị dữ liệu vào form xem chi tiết
            setVal(resource, data) {
                // Set order ID
                $(`${resource}`)
                    .find(".order-id")
                    .text(data.id || "");
                $(`${resource}`).find(".data-id").val(data.id);

                // Set order date
                $(`${resource}`)
                    .find(".order-date")
                    .text(data.order_date || "");

                // Set order status
                let statusIndex = parseInt(data.order_status) || 0;
                $(`${resource}`)
                    .find(".order-status-badge")
                    .text(View.Status.Order(statusIndex) || "")
                    .addClass(
                        `badge-${
                            View.Status.OrderColor(statusIndex) || "secondary"
                        }`
                    );
                $(`${resource}`)
                    .find(".order-status-text")
                    .text(View.Status.Order(statusIndex) || "");

                // Set customer info
                $(`${resource}`)
                    .find(".customer-username")
                    .text(data.username || "");
                $(`${resource}`)
                    .find(".customer-email")
                    .text(data.email || "");
                $(`${resource}`)
                    .find(".customer-phone")
                    .text(data.phone || "");
                $(`${resource}`)
                    .find(".customer-address")
                    .text(data.address || "");

                // Set payment info
                let paymentMethodIndex = parseInt(data.payment_method) || 0;
                $(`${resource}`)
                    .find(".payment-method-badge")
                    .text(View.Status.PaymentMethod(paymentMethodIndex) || "")
                    .addClass(
                        `badge-${
                            View.Status.PaymentMethodColor(
                                paymentMethodIndex
                            ) || "secondary"
                        }`
                    );

                let paymentStatusIndex = parseInt(data.payment_status) || 0;
                $(`${resource}`)
                    .find(".payment-status-badge")
                    .text(View.Status.Payment(paymentStatusIndex) || "")
                    .addClass(
                        `badge-${
                            View.Status.PaymentColor(paymentStatusIndex) ||
                            "secondary"
                        }`
                    );

                $(`${resource}`)
                    .find(".payment-date")
                    .text(data.payment_date || "Chưa thanh toán");

                // Set price info
                $(`${resource}`)
                    .find(".total-price")
                    .text(
                        IndexView.Config.formatPrices(data.total_price || 0) +
                            " đ"
                    );
                $(`${resource}`)
                    .find(".voucher-value")
                    .text((data.voucher_value || 0) + "%");
                $(`${resource}`)
                    .find(".real-price")
                    .text(
                        IndexView.Config.formatPrices(data.real_price || 0) +
                            " đ"
                    );
            },
            onBranchChange(callback) {
                $(document).on("change", `#branch-select`, function () {
                    callback(
                        $(this).val(),
                        View.FullTab.View.Order.order_value
                    );
                });
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
            // Render layout form xem
            init(name) {
                $(`[data-tab-name=${name}]`).html(View.Layout.FormView);
            },
        },
        // Hàm thực thi callback khi bấm button submit trong từng tab
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
        // Xóa nội dung của tab đang chọn
        default(name) {
            $(`[data-tab-name=${name}]`).html("");
        },
        // Hiển thị tab được chọn
        doShow(name) {
            $(".data-custom-tab").removeClass("on-show");
            $(`.data-custom-tab[data-tab-name=${name}]`).addClass("on-show");
        },
        // Lắng nghe sự kiện click vào tab (xem, xóa, sửa,...)
        onShow(name, callback) {
            $(document).on("click", `.tab-action`, function () {
                if ($(this).attr("atr").trim() == name) {
                    var id = $(this).attr("data-id");
                    callback(id);
                }
            });
        },
    },
    // Khởi tạo các phần của giao diện sản phẩm
    init() {
        View.Layout.init();
        View.table.init();
    },
};

// Hàm khởi động toàn bộ chức năng View
(() => {
    View.init();
    function init() {
        getData();
        getBranch();
        View.URL.setURL(View.URL.getFilterURL());
    }
    // Xử lý hiển thị tab Table (danh sách sản phẩm)
    View.FullTab.onShow("Table", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default("View");
        getData();
    });

    // Xử lý xem chi tiết đơn hàng
    View.FullTab.onShow("View", (id) => {
        View.FullTab.doShow("View");
        View.FullTab.View.init("View");
        IndexView.helper.showToastProcessing("Process", "Đang xử lí");
        Api.Order.getOne(id)
            .done((res) => {
                View.FullTab.View.Product = res.data.products;
                View.FullTab.View.Warehouse = res.data.warehouse_product;
                View.FullTab.View.Order = res.data.order;
                View.FullTab.View.OrderDetail = res.data.order_detail;
                View.FullTab.View.setVal(
                    "#popup-view",
                    View.FullTab.View.Order
                );
                View.FullTab.View.renderTableDetail(
                    "#popup-view",
                    View.FullTab.View.OrderDetail
                );
                View.FullTab.View.setValBranch();
                View.FullTab.View.renderStatusAction();
                IndexView.helper.showToastSuccess("Success", "Lấy ra dữ liệu");
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });
    // Sự kiện xác nhận cập nhật sản phẩm
    View.FullTab.onPush("Confirm", "#popup-update", () => {
        var fd = View.FullTab.Update.getVal("#popup-update");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing("Process", "Đang xử lí");
            Api.Product.Update(fd)
                .done((res) => {
                    IndexView.helper.showToastSuccess("Success", "Thành công");
                    getData();
                })
                .fail((err) => {
                    IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
                })
                .always(() => {});
        }
    });

    View.Filter.onChangeStatus((status) => {
        View.URL.setURL({ status: status });
        getData();
    });

    View.FullTab.View.onBranchChange((branch_id, order_value) => {
        View.Branch.selected = branch_id;
        Api.Warehouse.GetStockWithOrderAndBranch({
            branch_id: branch_id,
            order_value: order_value,
        })
            .done((res) => {
                View.FullTab.View.Warehouse = res.data;
                View.FullTab.View.renderTableDetail(
                    "#popup-view",
                    View.FullTab.View.OrderDetail
                );
                IndexView.helper.showToastSuccess("Success", "Lấy ra dữ liệu");
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });

    View.FullTab.View.onChangeStatus((status) => {
        if (status == 4) {
            var fd = new FormData();
            fd.append("order_id", View.FullTab.View.Order.id);
            fd.append("branch_id", View.Branch.selected);
            Api.Warehouse.StockOutCreate(fd)
                .done((res) => {})
                .fail((err) => {
                    IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
                })
                .always(() => {});
        }
        Api.Order.updateStatus(View.FullTab.View.Order.id, status)
            .done((res) => {
                IndexView.helper.showToastSuccess("Success", "Thành công");
                View.FullTab.doShow("Table");
                View.FullTab.default("View");
                getData();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });

    function getBranch() {
        Api.Branch.GetAll()
            .done((res) => {
                View.Branch.list = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    // Lấy toàn bộ dữ liệu sản phẩm từ API và render ra bảng
    function getData() {
        IndexView.helper.showToastProcessing("Process", "Đang xử lí");
        Api.Order.GetAll(View.URL.getFilterURL())
            .done((res) => {
                IndexView.helper.showToastSuccess("Success", "Lấy ra dữ liệu");
                IndexView.table.clearRows();
                Object.values(res.data).map((v) => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                });
                IndexView.table.render();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra" + err);
            });
    }

    // Gọi khởi tạo
    init();
})();
