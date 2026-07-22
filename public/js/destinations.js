const View = {
    shell() {
        return `
            <section class="admin-panel">
                <div class="admin-toolbar">
                    <div class="admin-toolbar-left">
                        <select id="dest-bulk-action" class="admin-bulk-select">
                            <option value="">Bulk actions</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Move to draft</option>
                            <option value="trash">Trash</option>
                        </select>
                        <button type="button" class="admin-toolbar-btn">Apply</button>
                        <select id="dest-status-filter" class="admin-filter-select">
                            <option value="all">All status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="admin-toolbar-right">
                        <input id="dest-search" class="admin-search-input" type="search" placeholder="Search destinations">
                        <button type="button" class="admin-toolbar-btn">Search</button>
                    </div>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table" id="destinations-table">
                        <thead>
                            <tr>
                                <th><input class="admin-checkbox" type="checkbox"></th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="dest-table-body"></tbody>
                    </table>
                </div>
            </section>
        `;
    },

    statusPill(status) {
        const normalized = String(status || "draft").toLowerCase();
        const tone = normalized === "published" ? "published" : normalized === "draft" ? "draft" : "default";
        return `<span class="admin-pill admin-pill--${tone}">${normalized}</span>`;
    },

    rowTable(item) {
        const category = [item.province_or_city, item.country].filter(Boolean).join(" · ") || "Uncategorized";
        return `
            <tr>
                <td><input class="admin-checkbox" type="checkbox"></td>
                <td>
                    <p class="admin-table-title">${item.name || ""}</p>
                    <p class="admin-table-meta">${item.slug || ""}</p>
                    <div class="admin-quick-actions">
                        <a href="#" class="admin-quick-link">Edit</a>
                        <a href="#" class="admin-quick-link">Quick Edit</a>
                        <a href="#" class="admin-quick-link">Trash</a>
                        <a href="#" class="admin-quick-link">View</a>
                    </div>
                </td>
                <td>Admin</td>
                <td>${category}</td>
                <td>${View.statusPill(item.status)}</td>
                <td>${item.updated_at || "N/A"}</td>
            </tr>
        `;
    },
};

(() => {
    const root = document.getElementById("admin-screen-root");
    if (!root) return;

    root.innerHTML = View.shell();

    Api.Destination.GetAll()
        .done((response) => {
            const items = response.data || [];
            if (!items.length) {
                $("#dest-table-body").html(`<tr><td colspan="6"><div class="admin-empty-state">Chưa có điểm đến nào trong database.</div></td></tr>`);
            } else {
                $("#dest-table-body").html(items.map(View.rowTable).join(""));
            }

            AdminDataTable.mount({
                selector: "#destinations-table",
                searchInputSelector: "#dest-search",
                statusFilterSelector: "#dest-status-filter",
                statusColumnIndex: 4,
                pageLength: 10,
                order: [[5, "desc"]],
                zeroRecords: "Chưa có điểm đến phù hợp bộ lọc",
                emptyTable: "Chưa có điểm đến nào trong database",
            });
        })
        .fail(() => {
            root.innerHTML = `<div class="admin-panel admin-empty-state">Không tải được danh sách điểm đến.</div>`;
        });
})();
