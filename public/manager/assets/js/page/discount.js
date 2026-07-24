const View = {
    Product: [],
    table: {
        __generateDTRow(data) {
            return [
                `<div class="id-order">${data.id}</div>`,
                data.product_name,
                data.value + "%",
                data.date_end == null
                    ? `<span class="badge badge-pill badge-blue">Vô hạn</span>`
                    : `<span class="badge badge-pill badge-success">${data.date_end}</span>`,
                data.status == 1
                    ? `<span class="badge badge-pill badge-success">Hoạt động</span>`
                    : `<span class="badge badge-pill badge-danger">Ngừng hoạt động</span>`,
                `<label class="switch"  data-id="${data.id}" data-status="${
                    data.status == "1" ? "2" : "1"
                }"> 
                    <input type="hidden" class="form-control" value="${
                        data?.status
                    }">
                <span class="slider round ${
                    data?.status == "1" ? "active canChangeStatus" : ""
                }"></span> `,
            ];
        },
        init() {
            var row_table = [
                {
                    title: "ID",
                    name: "name",
                    orderable: true,
                    width: "5%",
                },
                {
                    title: "Tên sản phẩm",
                    name: "name",
                    orderable: true,
                    width: "20%",
                },
                {
                    title: "Giảm giá",
                    name: "sold_count",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Thời gian kết thúc",
                    name: "revenue",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Trạng thái",
                    name: "inventory",
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
    Layout: {
        FormCreate: "",
        FormUpdate: "",
        FormDelete: "",
        init() {
            View.Layout.FormCreate = $(".layout-tab-create").html();
            View.Layout.FormUpdate = $(".layout-tab-create").html();
            View.Layout.FormDelete = $(".layout-tab-delete").html();
            $(".layout-tab-create").remove();
            $(".layout-tab-delete").remove();
        },
    },
    FullTab: {
        Create: {
            setVal() {
                $(".data-product-id option").remove();
                View.Product.map((v) => {
                    $(".data-product-id").append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_product_id = $(`${resource}`)
                    .find(".data-product-id")
                    .val();
                var data_value = $(`${resource}`).find(".data-value").val();
                var data_date_end = $(`${resource}`)
                    .find(".data-date-end")
                    .val();

                // --Required Value
                if (data_product_id == "") {
                    required_data.push("Nhập tên.");
                    onPushData = false;
                }
                if (data_value == "") {
                    required_data.push("Nhập mô tả.");
                    onPushData = false;
                }

                if (onPushData) {
                    fd.append("data_product_id", data_product_id);
                    fd.append("data_value", data_value);
                    fd.append("data_date_end", data_date_end);

                    return fd;
                } else {
                    $(`${resource}`).find(".error-log .js-errors").remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) {
                        required_noti += `<li class="error">${required_data[i]}</li>`;
                    }
                    $(`${resource}`)
                        .find(".error-log")
                        .prepend(
                            ` <ul class="js-errors">${required_noti}</ul> `
                        );
                    return false;
                }
            },
            init(name) {
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreate);
            },
        },
        Update: {
            setVal(resource, data) {},
            getVal(resource) {},
            init(name) {
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreate);
            },
        },
        Delete: {
            setVal(resource, id) {
                $(resource).find(".data-id").val(id);
            },
            getVal(resource) {
                $(resource).find(".data-id").val();
            },
            init(name) {
                $(`[data-tab-name=${name}]`).html(View.Layout.FormDelete);
            },
        },
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
        default(name) {
            $(`[data-tab-name=${name}]`).html("");
        },
        doShow(name) {
            $(".data-custom-tab").removeClass("on-show");
            $(`.data-custom-tab[data-tab-name=${name}]`).addClass("on-show");
        },
        onShow(name, callback) {
            $(document).on("click", `.tab-action`, function () {
                if ($(this).attr("atr").trim() == name) {
                    var id = $(this).attr("data-id");
                    callback(id);
                }
            });
        },
    },
    init() {
        View.Layout.init();
        View.table.init();
    },
};
(() => {
    View.init();
    function init() {
        getData();
        getProduct();
    }
    // Table
    View.FullTab.onShow("Table", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default("Create");
        View.FullTab.default("Update");
        getData();
    });

    // Create
    View.FullTab.onShow("Create", () => {
        View.FullTab.doShow("Create");
        View.FullTab.Create.init("Create");
        View.FullTab.Create.setVal();
    });
    View.FullTab.onPush("Confirm", "#popup-create", () => {
        var fd = View.FullTab.Create.getVal("#popup-create");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing("Process", "Đang xử lí");
            Api.Discount.Store(fd)
                .done((res) => {
                    if (res.data == false) {
                        IndexView.helper.showToastError(
                            "Error",
                            "Không thể tạo sản phẩm đã tồn tại"
                        );
                    } else {
                        IndexView.helper.showToastSuccess(
                            "Success",
                            "Thành công"
                        );
                    }
                    getData();
                })
                .fail((err) => {
                    IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
                })
                .always(() => {});
        }
    });
    IndexView.table.onSwitch(
        debounce((item) => {
            Api.Discount.UnActive(
                item.attr("data-id"),
                item.attr("data-status")
            )
                .done((res) => {
                    getData();
                    item.find(".slider.canChangeStatus").toggleClass("active");
                })
                .fail((err) => {
                    console.log(err);
                })
                .always(() => {});
        }, 500)
    );

    // Lấy toàn bộ dữ liệu sản phẩm từ API và render ra bảng
    function getProduct() {
        Api.Product.GetAll()
            .done((res) => {
                View.Product = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    function getData() {
        Api.Discount.GetAll()
            .done((res) => {
                IndexView.table.clearRows();
                Object.values(res.data).map((v) => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                });
                IndexView.table.render();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

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
    init();
})();
