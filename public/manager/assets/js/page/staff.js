const View = { 
    Roles: [],
    Branch: [],
    table: {
        __generateDTRow(data) {
            return [
                `<div class="id-order">${data.id}</div>`,
                `${data.email}`,
                `${data.name}`,
                `${data.phone}`,
                `${data.address}`,
                `<div class="view-data tab-action" atr="View" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data tab-action" atr="Delete" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`,
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
                    title: "Email",
                    name: "name",
                    orderable: true,
                    width: "20%",
                },
                {
                    title: "Họ và tên",
                    name: "sold_count",
                    orderable: true,
                    width: "10%",
                },
                {
                    title: "Số điện thoại",
                    name: "revenue",
                    orderable: true, 
                    width: "10%", 
                },
                {
                    title: "Địa chỉ",
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
            setVal(resource, data) { 
                View.Roles.map((v) => {
                    $(".data-role_id").append(
                        `<option value="${v.id}">${v.name}</option>`
                    );
                });
                View.Branch.map((v) => {
                    $(".data-branch_id").append(
                        `<option value="${v.id}">${v.name}</option>` 
                    );
                });
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true; 
                var data_email = $(`${resource}`).find(".data-email").val();
                var data_password = $(`${resource}`)
                    .find(".data-password")
                    .val();
                var data_name = $(`${resource}`).find(".data-name").val();
                var data_phone = $(`${resource}`).find(".data-phone").val();
                var data_address = $(`${resource}`).find(".data-address").val();
                var data_role_id = $(`${resource}`).find(".data-role_id").val();
                var data_branch_id = $(`${resource}`)
                    .find(".data-branch_id")
                    .val();

                // --Required Value
                if (data_email == "") {
                    required_data.push("Nhập email.");
                    onPushData = false;
                }
                if (data_password == "") {
                    required_data.push("Nhập mật khẩu.");
                    onPushData = false;
                }
                if (data_name == "") {
                    required_data.push("Nhập tên.");
                    onPushData = false;
                }
                if (data_phone == "") {
                    required_data.push("Nhập số điện thoại.");
                    onPushData = false;
                }
                if (data_address == "") {
                    required_data.push("Nhập địa chỉ.");
                    onPushData = false;
                }
                if (data_role_id == "") {
                    required_data.push("Chọn vai trò.");
                    onPushData = false;
                }
                if (data_branch_id == "") {
                    required_data.push("Chọn chi nhánh.");
                    onPushData = false;
                }

                if (onPushData) {
                    fd.append("data_email", data_email);
                    fd.append("data_password", data_password);
                    fd.append("data_role_id", data_role_id);
                    fd.append("data_branch_id", data_branch_id); 
                    fd.append("data_name", data_name);
                    fd.append("data_phone", data_phone);
                    fd.append("data_address", data_address);

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
                View.Manager.map((v) => {
                    $(".data-manager").append(
                        `<option value="${v.id}">${v.email}</option>`
                    );
                });
                $(`${resource}`).find(".data-id").val(data.id);
                $(`${resource}`).find(".data-manager").val(data.admin_id);
                $(`${resource}`).find(".data-name").val(data.name);
                $(`${resource}`).find(".data-phone").val(data.phone);
                $(`${resource}`).find(".data-address").val(data.address);
            },
            getVal(resource) {
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_id = $(`${resource}`).find(".data-id").val();
                var data_manager = $(`${resource}`).find(".data-manager").val();
                var data_name = $(`${resource}`).find(".data-name").val();
                var data_phone = $(`${resource}`).find(".data-phone").val();
                var data_address = $(`${resource}`).find(".data-address").val();

                // --Required Value
                if (data_manager == 0) {
                    required_data.push("Chọn người quản lí.");
                    onPushData = false;
                }
                if (data_name == "") {
                    required_data.push("Nhập tên.");
                    onPushData = false;
                }
                if (data_phone == "") {
                    required_data.push("Nhập số điện thoại.");
                    onPushData = false;
                }
                if (data_address == "") {
                    required_data.push("Nhập địa chỉ.");
                    onPushData = false;
                }

                if (onPushData) {
                    fd.append("data_id", data_id);
                    fd.append("data_manager", data_manager);
                    fd.append("data_name", data_name);
                    fd.append("data_phone", data_phone);
                    fd.append("data_address", data_address);

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
        getRoles();
        getBranch(); 
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
            Api.Manager.Store(fd) 
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
        Api.Manager.getOne(id) 
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
            Api.Manager.Update(fd) 
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
        Api.Manager.Delete($("#popup-delete").find(".data-id").val()) 
            .done((res) => {
                IndexView.helper.showToastSuccess("Success", "Thành công");
                getData();
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    });

     
    function getData() {
        Api.Manager.GetAll()
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

    // Khi bấm vào .btn-random-password thì generate random password và gán vào .data-password
    $(document).on("click", ".btn-random-password", function () {
        // Hàm generate random password
        function generateRandomPassword(length = 10) {
            // Sử dụng các ký tự chữ hoa, chữ thường, số, một số ký tự đặc biệt
            const chars =
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
            let password = "";
            for (let i = 0; i < length; i++) {
                password += chars.charAt(
                    Math.floor(Math.random() * chars.length)
                );
            }
            return password;
        }

        // tìm input cùng hàng với nút bấm, có class data-password
        const passwordInput = $(this).closest(".d-flex").find(".data-password");
        if (passwordInput.length) {
            const randomPass = generateRandomPassword(10);
            passwordInput.val(randomPass);
        }
    });

    function getBranch() {
        Api.Branch.GetAll()
            .done((res) => {
                View.Branch = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    function getRoles() {
        Api.Role.GetAll()
            .done((res) => {
                View.Roles = res.data;
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }
 
    init();
})();
