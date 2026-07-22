const AdminDataTable = {
    destroy(selector) {
        if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().destroy();
        }
    },

    mount(config) {
        const selector = config.selector;
        const table = $(selector);
        if (!table.length) return null;

        this.destroy(selector);

        const options = {
            pageLength: config.pageLength || 10,
            lengthMenu: config.lengthMenu || [10, 25, 50, 100],
            order: config.order || [],
            responsive: false,
            autoWidth: false,
            language: {
                search: "",
                searchPlaceholder: config.searchPlaceholder || "Tìm kiếm...",
                lengthMenu: "Hiển thị _MENU_ dòng",
                info: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                infoEmpty: "Không có dữ liệu",
                zeroRecords: config.zeroRecords || "Không tìm thấy dữ liệu phù hợp",
                emptyTable: config.emptyTable || "Chưa có dữ liệu",
                paginate: {
                    first: "Đầu",
                    last: "Cuối",
                    next: "Sau",
                    previous: "Trước",
                },
            },
            columnDefs: config.columnDefs || [],
            dom:
                "<'row m-b-15'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "t" +
                "<'row m-t-15'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        };

        const dt = table.DataTable(options);

        if (config.searchInputSelector) {
            const input = $(config.searchInputSelector);
            if (input.length) {
                input.off(".datatableSearch").on("input.datatableSearch", function () {
                    dt.search($(this).val()).draw();
                });
                table.closest(".admin-panel").find("div.dataTables_filter").hide();
            }
        }

        if (config.statusFilterSelector && typeof config.statusColumnIndex === "number") {
            const filter = $(config.statusFilterSelector);
            if (filter.length) {
                filter.off(".datatableFilter").on("change.datatableFilter", function () {
                    const value = $(this).val();
                    if (!value || value === "all") {
                        dt.column(config.statusColumnIndex).search("").draw();
                        return;
                    }
                    dt.column(config.statusColumnIndex).search(value, true, false).draw();
                });
            }
        }

        return dt;
    },
};

window.AdminDataTable = AdminDataTable;
