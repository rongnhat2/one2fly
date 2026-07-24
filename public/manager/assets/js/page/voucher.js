const View = {
    Customer: [],
    table: {
        __generateDTRow(data) {
            const customerName = data.username || "Tất cả khách hàng";
            const statusText =
                data.status_use == "1" ? "Chưa sử dụng" : "Đã sử dụng";
            const switchStatus = data.status == "1" ? "0" : "1";
            const sliderClass = data.status == "1" ? "active" : "";

            return [
                `<div class="id-order">${data.id}</div>`,
                customerName,
                data.code,
                `${data.value}%`,
                data.expires_at,
                data.used,
                `<label class="switch" data-id="${data.id}" data-status="${data.status}" atr="Status">
                    <span class="slider round ${sliderClass}"></span>
                </label>`,
            ];
        },

        init() {
            const tableColumns = [
                { title: "ID", name: "id", orderable: true, width: "10%" },
                {
                    title: "Người sử dụng",
                    name: "customer_auth_id",
                    orderable: true,
                    width: "20%",
                },
                { title: "Mã", name: "code", orderable: true },
                { title: "Giá trị", name: "value", orderable: true },
                { title: "Ngày hết hạn", name: "expires_at", orderable: true },
                { title: "Số lượt sử dụng", name: "uses", orderable: true },
                { title: "Hoạt động", name: "status", orderable: true },
            ];

            IndexView.table.init("#data-table", tableColumns);
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
                const $select = $(document).find(".data-customer_auth_id");
                $select.append('<option value="0">Tất cả khách hàng</option>');

                View.Customer.forEach((customer) => {
                    $select.append(
                        `<option value="${customer.id}">${customer.username} - ${customer.email}</option>`
                    );
                });
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                const noTag = /<[^>]*>?/gm;
                const formData = new FormData();
                const requiredData = [];

                const dataValue = $(`${resource}`)
                    .find(".data-value")
                    .val()
                    .replace(noTag, "");

                const dataExpiresAt = $(`${resource}`)
                    .find(".data-expires_at")
                    .val()
                    .replace(noTag, "");

                const dataCustomerAuthId = $(`${resource}`)
                    .find(".data-customer_auth_id")
                    .val()
                    .replace(noTag, "");

                // Validation
                if (!dataValue) {
                    requiredData.push("Nhập giá trị.");
                }

                if (!dataExpiresAt) {
                    requiredData.push("Nhập ngày hết hạn.");
                }

                if (requiredData.length === 0) {
                    formData.append("data_value", dataValue);
                    formData.append("data_expires_at", dataExpiresAt);
                    formData.append(
                        "data_customer_auth_id",
                        dataCustomerAuthId
                    );
                    return formData;
                } else {
                    $(`${resource}`).find(".error-log .js-errors").remove();
                    var required_noti = ``;
                    for (var i = 0; i < requiredData.length; i++) {
                        required_noti += `<li class="error">${requiredData[i]}</li>`;
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
            setVal(resource, data) {
                $(`${resource}`).find(".data-id").val(data.id);
                $(`${resource}`).find(".data-name").val(data.name);
                $(`${resource}`)
                    .find(".data-description")
                    .val(data.description);
                $(`${resource}`)
                    .find(".image-preview")
                    .attr("src", `/${data.image}`);
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_id = $(`${resource}`).find(".data-id").val();
                var data_name = $(`${resource}`).find(".data-name").val();
                var data_description = $(`${resource}`)
                    .find(".data-description")
                    .val();
                var data_image = $(`${resource}`).find(".image-input")[0].files;

                // --Required Value
                if (data_name == "") {
                    required_data.push("Nhập tên.");
                    onPushData = false;
                }
                if (data_description == "") {
                    required_data.push("Nhập mô tả.");
                    onPushData = false;
                }

                if (onPushData) {
                    fd.append("data_id", data_id);
                    fd.append("data_name", data_name);
                    fd.append("data_description", data_description);
                    fd.append("data_image", data_image[0]);

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
        getCustomer();
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
            Api.Voucher.Store(fd)
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

    // Update
    View.FullTab.onShow("View", (id) => {
        View.FullTab.doShow("Update");
        View.FullTab.Update.init("Update");
        IndexView.helper.showToastProcessing("Process", "Đang xử lí");
        Api.Voucher.getOne(id)
            .done((res) => {
                View.FullTab.Update.setVal("#popup-update", res.data);
                IndexView.helper.showToastSuccess("Success", "Lấy ra dữ liệu");
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });
    View.FullTab.onPush("Confirm", "#popup-update", () => {
        var fd = View.FullTab.Update.getVal("#popup-update");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing("Process", "Đang xử lí");
            Api.Voucher.Update(fd)
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

    // Delete
    View.FullTab.onShow("Delete", (id) => {
        View.FullTab.doShow("Delete");
        View.FullTab.Delete.init("Delete");
        View.FullTab.Delete.setVal("#popup-delete", id);
    });
    View.FullTab.onPush("Delete", "#popup-delete", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default();
        IndexView.helper.showToastProcessing("Process", "Đang xử lí");
        Api.Voucher.Delete($("#popup-delete").find(".data-id").val())
            .done((res) => {
                IndexView.helper.showToastSuccess("Success", "Thành công");
                getData();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });
    IndexView.table.onSwitch(
        debounce((item) => {
            Api.Voucher.Status(item.attr("data-id"))
                .done((res) => {
                    getData();
                    item.find(".slider").toggleClass("active");
                })
                .fail((err) => {
                    console.log(err);
                })
                .always(() => {});
        }, 500)
    );

    function getData() {
        Api.Voucher.GetAll()
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

    function getCustomer() {
        Api.Customer.GetAll()
            .done((res) => {
                View.Customer = res.data;
            })
            .fail(() => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            });
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
