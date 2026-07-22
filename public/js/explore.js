const View = {
    shell() {
        return `
            <section class="admin-panel">
                <div class="admin-toolbar">
                    <div class="admin-toolbar-left">
                        <select id="explore-bulk-action" class="admin-bulk-select">
                            <option value="">Bulk actions</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Move to draft</option>
                            <option value="trash">Trash</option>
                        </select>
                        <button type="button" class="admin-toolbar-btn">Apply</button>
                        <select id="explore-status-filter" class="admin-filter-select">
                            <option value="all">All status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="admin-toolbar-right">
                        <input id="explore-search" class="admin-search-input" type="search" placeholder="Search explore items">
                        <button type="button" class="admin-toolbar-btn">Search</button>
                    </div>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table" id="explore-table">
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
                        <tbody id="explore-table-body"></tbody>
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
        return `
            <tr>
                <td><input class="admin-checkbox" type="checkbox"></td>
                <td>
                    <p class="admin-table-title">${item.title || ""}</p>
                    <p class="admin-table-meta">${item.slug || ""}</p>
                    <div class="admin-quick-actions">
                        <a href="#" class="admin-quick-link">Edit</a>
                        <a href="#" class="admin-quick-link">Quick Edit</a>
                        <a href="#" class="admin-quick-link">Trash</a>
                        <a href="#" class="admin-quick-link">View</a>
                    </div>
                </td>
                <td>Admin</td>
                <td>${item.location_name || item.content_type || "Uncategorized"}</td>
                <td>${View.statusPill(item.status)}</td>
                <td>${item.updated_at || item.published_at || "N/A"}</td>
            </tr>
        `;
    },
};

(() => {
    const root = document.getElementById("admin-screen-root");
    if (!root) return;

    root.innerHTML = View.shell();

    Api.Explore.GetAll()
        .done((response) => {
            const items = response.data || [];
            if (!items.length) {
                $("#explore-table-body").html(`<tr><td colspan="6"><div class="admin-empty-state">Chưa có item khám phá nào.</div></td></tr>`);
            } else {
                $("#explore-table-body").html(items.map(View.rowTable).join(""));
            }

            AdminDataTable.mount({
                selector: "#explore-table",
                searchInputSelector: "#explore-search",
                statusFilterSelector: "#explore-status-filter",
                statusColumnIndex: 4,
                pageLength: 10,
                order: [[5, "desc"]],
                zeroRecords: "Chưa có item phù hợp bộ lọc",
                emptyTable: "Chưa có item khám phá nào",
            });
        })
        .fail(() => {
            root.innerHTML = `<div class="admin-panel admin-empty-state">Không tải được danh sách explore items.</div>`;
        });
})();
