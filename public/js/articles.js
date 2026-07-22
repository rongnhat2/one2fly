const View = {
    shell() {
        return `
            <section class="admin-panel">
                <div class="admin-toolbar">
                    <div class="admin-toolbar-left">
                        <select id="article-bulk-action" class="admin-bulk-select">
                            <option value="">Bulk actions</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Move to draft</option>
                            <option value="trash">Trash</option>
                        </select>
                        <button type="button" class="admin-toolbar-btn">Apply</button>
                        <select id="article-status-filter" class="admin-filter-select">
                            <option value="all">All status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="admin-toolbar-right">
                        <input id="article-search" class="admin-search-input" type="search" placeholder="Search articles">
                        <button type="button" class="admin-toolbar-btn">Search</button>
                    </div>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table" id="articles-table">
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
                        <tbody id="article-table-body"></tbody>
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
                <td>Editor</td>
                <td>${item.type || "article"}</td>
                <td>${View.statusPill(item.status)}</td>
                <td>${item.published_at || item.updated_at || "N/A"}</td>
            </tr>
        `;
    },
};

(() => {
    const root = document.getElementById("admin-screen-root");
    if (!root) return;

    root.innerHTML = View.shell();

    Api.Article.GetAll()
        .done((response) => {
            const items = response.data || [];
            if (!items.length) {
                $("#article-table-body").html(`<tr><td colspan="6"><div class="admin-empty-state">Chưa có bài viết nào.</div></td></tr>`);
            } else {
                $("#article-table-body").html(items.map(View.rowTable).join(""));
            }

            AdminDataTable.mount({
                selector: "#articles-table",
                searchInputSelector: "#article-search",
                statusFilterSelector: "#article-status-filter",
                statusColumnIndex: 4,
                pageLength: 10,
                order: [[5, "desc"]],
                zeroRecords: "Chưa có bài viết phù hợp bộ lọc",
                emptyTable: "Chưa có bài viết nào",
            });
        })
        .fail(() => {
            root.innerHTML = `<div class="admin-panel admin-empty-state">Không tải được danh sách bài viết.</div>`;
        });
})();
