const Api = {
    Auth: {},
    Manager: {},
    Category: {},
    Product: {},
    Supplier: {},
    Branch: {},
    Warehouse: {},
    Customer: {},
    Order: {},
    Discount: {},
    Voucher: {},
    Role: {},
    Permission: {},
    Statistic: {},

    Image: {},
};
(() => {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        crossDomain: true,
    });
})();

//Auth
(() => {
    Api.Auth.Login = (data) =>
        $.ajax({
            url: `/api/admin/auth/login`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
})();
//Statistic
(() => {
    Api.Statistic.getNavData = () =>
        $.ajax({
            url: `/api/admin/statistic/get-nav-data`,
            method: "GET",
        });
    Api.Statistic.getPricesChart = () =>
        $.ajax({
            url: `/api/admin/statistic/get-prices-chart`,
            method: "GET",
        });
    Api.Statistic.getOrdersChart = () =>
        $.ajax({
            url: `/api/admin/statistic/get-orders-chart`,
            method: "GET",
        });
    Api.Statistic.getOrdersStatusChart = () =>
        $.ajax({
            url: `/api/admin/statistic/get-orders-status-chart`,
            method: "GET",
        });
})();

//Manager
(() => {
    Api.Manager.GetAll = () =>
        $.ajax({
            url: `/api/admin/manager/get`,
            method: "GET",
        });
    Api.Manager.Store = (data) =>
        $.ajax({
            url: `/api/admin/staff/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Manager.getOne = (id) =>
        $.ajax({
            url: `/api/admin/staff/get-one/${id}`,
            method: "GET",
        });
    Api.Manager.Update = (data) =>
        $.ajax({
            url: `/api/admin/staff/update`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Manager.Delete = (id) =>
        $.ajax({
            url: `/api/admin/staff/delete/${id}`,
            method: "GET",
        });
})();

//Role
(() => {
    Api.Role.GetAll = () =>
        $.ajax({
            url: `/api/admin/role/get`,
            method: "GET",
        });
    Api.Role.Store = (data) =>
        $.ajax({
            url: `/api/admin/role/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Role.getOne = (id) =>
        $.ajax({
            url: `/api/admin/role/get-one/${id}`,
            method: "GET",
        });
    Api.Role.Update = (data) =>
        $.ajax({
            url: `/api/admin/role/update`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Role.Delete = (id) =>
        $.ajax({
            url: `/api/admin/role/delete/${id}`,
            method: "GET",
        });
})();

//Permission
(() => {
    Api.Permission.GetAll = () =>
        $.ajax({
            url: `/api/admin/permissions/get`,
            method: "GET",
        });
})();

//Customer
(() => {
    Api.Customer.GetAll = () =>
        $.ajax({
            url: `/api/admin/customer/get`,
            method: "GET",
        });
})();

//Voucher
(() => {
    Api.Voucher.GetAll = () =>
        $.ajax({
            url: `/api/admin/voucher/get`,
            method: "GET",
        });
    Api.Voucher.Store = (data) =>
        $.ajax({
            url: `/api/admin/voucher/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Voucher.Status = (id) =>
        $.ajax({
            url: `/api/admin/voucher/change_status`,
            method: "GET",
            dataType: "json",
            data: {
                id: id,
            },
        });
})();

//Warehouse
(() => {
    Api.Warehouse.StockInCreate = (data) =>
        $.ajax({
            url: `/api/admin/warehouse/stock-in/create`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Warehouse.StockInGetAll = () =>
        $.ajax({
            url: `/api/admin/warehouse/stock-in/get`,
            method: "GET",
        });
    Api.Warehouse.StockInGetDetail = (id) =>
        $.ajax({
            url: `/api/admin/warehouse/stock-in/get-detail/${id}`,
            method: "GET",
        });

    Api.Warehouse.GetStockWithOrderAndBranch = (data) =>
        $.ajax({
            url: `/api/admin/warehouse/get-stock-with-order-and-branch`,
            method: "GET",
            dataType: "json",
            data: {
                order_value: data.order_value ?? "",
                branch_id: data.branch_id ?? "",
            },
        });

    Api.Warehouse.StockOutCreate = (data) =>
        $.ajax({
            url: `/api/admin/warehouse/stock-out/create`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Warehouse.StockOutGetAll = () =>
        $.ajax({
            url: `/api/admin/warehouse/stock-out/get`,
            method: "GET",
        });
})();

//category
(() => {
    Api.Category.GetAll = () =>
        $.ajax({
            url: `/api/admin/category/get`,
            method: "GET",
        });
    Api.Category.Store = (data) =>
        $.ajax({
            url: `/api/admin/category/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Category.getOne = (id) =>
        $.ajax({
            url: `/api/admin/category/get-one/${id}`,
            method: "GET",
        });
    Api.Category.Update = (data) =>
        $.ajax({
            url: `/api/admin/category/update`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Category.Delete = (id) =>
        $.ajax({
            url: `/api/admin/category/delete/${id}`,
            method: "GET",
        });
})();

//discount
(() => {
    Api.Discount.GetAll = () =>
        $.ajax({
            url: `/api/admin/discount/get`,
            method: "GET",
        });
    Api.Discount.Store = (data) =>
        $.ajax({
            url: `/api/admin/discount/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Discount.getOne = (id) =>
        $.ajax({
            url: `/api/admin/discount/get-one/${id}`,
            method: "GET",
        });
    Api.Discount.UnActive = (id, status) =>
        $.ajax({
            url: `/api/admin/discount/un-active`,
            method: "PUT",
            dataType: "json",
            data: {
                id: id ?? "",
                status: status ?? "",
            },
        });
})();

//category
(() => {
    Api.Order.GetAll = (filter) =>
        $.ajax({
            url: `/api/admin/order/get`,
            method: "GET",
            dataType: "json",
            data: {
                status: filter.status ?? "",
            },
        });
    Api.Order.getOne = (id) =>
        $.ajax({
            url: `/api/admin/order/get-one/${id}`,
            method: "GET",
        });
    Api.Order.updateStatus = (id, status) =>
        $.ajax({
            url: `/api/admin/order/update-status`,
            method: "GET",
            dataType: "json",
            data: {
                id: id,
                status: status,
            },
        });
})();

//branch
(() => {
    Api.Branch.GetAll = () =>
        $.ajax({
            url: `/api/admin/branch/get`,
            method: "GET",
        });
    Api.Branch.Store = (data) =>
        $.ajax({
            url: `/api/admin/branch/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Branch.getOne = (id) =>
        $.ajax({
            url: `/api/admin/branch/get-one/${id}`,
            method: "GET",
        });
    Api.Branch.Update = (data) =>
        $.ajax({
            url: `/api/admin/branch/update`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Branch.Delete = (id) =>
        $.ajax({
            url: `/api/admin/branch/delete/${id}`,
            method: "GET",
        });
})();

//Supplier
(() => {
    Api.Supplier.GetAll = () =>
        $.ajax({
            url: `/api/admin/supplier/get`,
            method: "GET",
        });
    Api.Supplier.Store = (data) =>
        $.ajax({
            url: `/api/admin/supplier/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Supplier.getOne = (id) =>
        $.ajax({
            url: `/api/admin/supplier/get-one/${id}`,
            method: "GET",
        });
    Api.Supplier.Update = (data) =>
        $.ajax({
            url: `/api/admin/supplier/update`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Supplier.Delete = (id) =>
        $.ajax({
            url: `/api/admin/supplier/delete/${id}`,
            method: "GET",
        });
})();

//product
(() => {
    Api.Product.GetAll = (filter = {}) =>
        $.ajax({
            url: `/api/admin/product/get`,
            method: "GET",
            dataType: "json",
            data: {
                branch_id: filter.branch_id ?? "",
            },
        });
    Api.Product.Store = (data) =>
        $.ajax({
            url: `/api/admin/product/store`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Product.getOne = (id) =>
        $.ajax({
            url: `/api/admin/product/get-one/${id}`,
            method: "GET",
        });
    Api.Product.Update = (data) =>
        $.ajax({
            url: `/api/admin/product/update`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
    Api.Product.Delete = (id) =>
        $.ajax({
            url: `/api/admin/product/delete/${id}`,
            method: "GET",
        });
})();

// Image
(() => {
    Api.Image.Create = (data) =>
        $.ajax({
            url: `/apip/post-image`,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
        });
})();
