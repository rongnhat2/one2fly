const View = {
    Permission: {
        List: [],
        render() {
            // Nhóm các quyền theo prefix trước dấu "_" (ví dụ, "branch_update" thuộc nhóm "branch")
            let groupPermissions = {};
            View.Permission.List.forEach((v) => {
                let parts = v.slug.split("_");
                let group = parts[0];
                if (!groupPermissions[group]) {
                    groupPermissions[group] = [];
                }
                groupPermissions[group].push(v);
            });
            // Xóa nội dung hiện tại của danh sách quyền
            $("#permissions-list").html("");

            Object.keys(groupPermissions).forEach((group) => {
                // Tạo group header
                $("#permissions-list").append(
                    `<div class="row" data-group="${group}"><div class="col-12 permission-group fw-bold" style="margin-top:10px;">${group}</div></div>`
                );
                groupPermissions[group].forEach((v) => {
                    $(`#permissions-list .row[data-group='${group}']`).append(`
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input permission-checkbox" type="checkbox" id="permission${v.id}" value="${v.id}">
                                <label class="form-check-label" for="permission${v.id}">${v.name}</label>
                            </div>
                        </div>
                    `);
                });
            });
        },
        getVal() {
            // Trả về danh sách id permission đã được checked dưới dạng string, cách nhau bởi dấu phẩy
            let checked = [];
            $("#permissions-list input.permission-checkbox:checked").each(
                function () {
                    checked.push($(this).val());
                }
            );
            return checked.join(",");
        },
    },
    table: {
        __generateDTRow(data) {
            return [
                `<div class="id-order">${data.id}</div>`,
                `<div class="d-flex"> 
                    <div>
                        <h6 class="m-b-0">
                            <a href="javascript:void(0);" class="text-dark"> ${data.name}</a>
                        </h6> 
                    </div>
                </div>`,
                `<div class="view-data tab-action" atr="View" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>`,
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
                    title: "Tên quyền",
                    name: "name",
                    orderable: true,
                    width: "20%",
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
        FormAssign: "",
        init() {
            View.Layout.FormCreate = $(".layout-tab-create").html();
            View.Layout.FormUpdate = $(".layout-tab-create").html();
            View.Layout.FormDelete = $(".layout-tab-delete").html();
            View.Layout.FormAssign = $(".layout-tab-assign").html();
            $(".layout-tab-create").remove();
            $(".layout-tab-delete").remove();
            $(".layout-tab-assign").remove();
        },
    },
    FullTab: {
        Create: {
            setVal(resource, data) {
                View.Permission.render();
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_name = $(`${resource}`).find(".data-name").val();

                // --Required Value
                if (data_name == "") {
                    required_data.push("Nhập tên.");
                    onPushData = false;
                }

                if (onPushData) {
                    fd.append("data_name", data_name);
                    fd.append("data_permission", View.Permission.getVal());

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
            setVal(resource, data) {
                $(`${resource}`).find(".data-id").val(data.id);
                $(`${resource}`).find(".data-name").val(data.name);
                View.Permission.render();
                data.permissions.forEach((v) => {
                    $(`#permissions-list input[value="${v.id}"]`).prop(
                        "checked",
                        true
                    );
                });
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_id = $(`${resource}`).find(".data-id").val();
                var data_name = $(`${resource}`).find(".data-name").val();

                // --Required Value
                if (data_name == "") {
                    required_data.push("Nhập tên.");
                    onPushData = false;
                }

                if (onPushData) {
                    fd.append("data_id", data_id);
                    fd.append("data_name", data_name);
                    fd.append("data_permission", View.Permission.getVal());

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
        getPermission();
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
            Api.Role.Store(fd)
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
        Api.Role.getOne(id)
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
            Api.Role.Update(fd)
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
        Api.Role.Delete($("#popup-delete").find(".data-id").val())
            .done((res) => {
                IndexView.helper.showToastSuccess("Success", "Thành công");
                getData();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });

    function getPermission() {
        Api.Permission.GetAll()
            .done((res) => {
                View.Permission.List = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    function getData() {
        Api.Role.GetAll()
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
