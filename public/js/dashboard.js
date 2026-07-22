const View = {
    shell() {
        return `
            <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-5" id="dashboard-stats"></section>
            <section class="grid gap-6 xl:grid-cols-3" id="dashboard-lists"></section>
        `;
    },

    statCard(item) {
        const accents = {
            sky: "bg-[#e9f6ff] text-[#0368B4]",
            emerald: "bg-[#e9fbf4] text-[#0f9f6e]",
            amber: "bg-[#fff6e4] text-[#c78600]",
            violet: "bg-[#f1edff] text-[#6d4aff]",
            rose: "bg-[#fff0f3] text-[#d14b72]",
        };
        const accentClass = accents[item.accent] || accents.sky;
        const badge = String(item.label || "")
            .split(" ")
            .map((part) => part.charAt(0))
            .join("")
            .slice(0, 2)
            .toUpperCase();

        return `
            <article class="admin-stat-card">
                <span class="admin-stat-badge ${accentClass}">${badge || "OK"}</span>
                <p class="text-[12px] uppercase tracking-[0.18em] text-[#6b7f95] font-semibold mt-5">${item.label}</p>
                <h3 class="admin-serif text-[40px] leading-none text-[#10233a] mt-3">${item.value}</h3>
            </article>
        `;
    },

    listPanel(title, items, renderer) {
        return `
            <article class="admin-panel p-6">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <h3 class="admin-serif text-[32px] text-[#10233a]">${title}</h3>
                    <span class="text-[11px] uppercase tracking-[0.18em] text-[#4b8bc6] font-semibold">Mới nhất</span>
                </div>
                ${items.length ? `<ul class="admin-mini-list">${items.map(renderer).join("")}</ul>` : `<div class="admin-empty-state">Chưa có dữ liệu để hiển thị.</div>`}
            </article>
        `;
    },

    listItem(primary, secondary, meta) {
        return `
            <li>
                <div class="admin-mini-list-item">
                    <div>
                        <p class="text-[15px] font-semibold text-[#10233a]">${primary}</p>
                        <p class="text-[13px] text-[#6b7f95] mt-1">${secondary}</p>
                    </div>
                    <span class="text-[11px] uppercase tracking-[0.14em] text-[#8aa0b5] whitespace-nowrap">${meta}</span>
                </div>
            </li>
        `;
    },
};

(() => {
    const root = document.getElementById("admin-screen-root");
    if (!root) return;

    root.innerHTML = View.shell();

    Api.Dashboard.GetAll()
        .done((response) => {
            const data = response.data || {};
            const stats = data.stats || [];
            const latestDestinations = data.latest_destinations || [];
            const latestIssues = data.latest_issues || [];
            const latestArticles = data.latest_articles || [];

            $("#dashboard-stats").html(stats.map(View.statCard).join(""));
            $("#dashboard-lists").html([
                View.listPanel("Điểm đến mới", latestDestinations, (item) =>
                    View.listItem(item.name, item.slug || "Chưa có slug", item.status || "draft")
                ),
                View.listPanel("Ấn phẩm mới", latestIssues, (item) =>
                    View.listItem(item.title, `Số ${item.issue_number || "N/A"}`, item.status || "draft")
                ),
                View.listPanel("Bài viết mới", latestArticles, (item) =>
                    View.listItem(item.title, item.type || "article", item.status || "draft")
                ),
            ].join(""));
        })
        .fail(() => {
            root.innerHTML = `<div class="admin-panel admin-empty-state">Không tải được dữ liệu dashboard.</div>`;
        });
})();
