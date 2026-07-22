const View = {
    shell() {
        return `
            <section class="grid gap-4 md:grid-cols-3">
                <article class="admin-stat-card"><p class="text-[12px] uppercase tracking-[0.18em] text-[#6b7f95] font-semibold">Vùng ẩm thực</p><h3 class="admin-serif text-[40px] text-[#10233a] mt-3" id="food-region-total">0</h3></article>
                <article class="admin-stat-card"><p class="text-[12px] uppercase tracking-[0.18em] text-[#6b7f95] font-semibold">Món ăn</p><h3 class="admin-serif text-[40px] text-[#10233a] mt-3" id="dish-total">0</h3></article>
                <article class="admin-stat-card"><p class="text-[12px] uppercase tracking-[0.18em] text-[#6b7f95] font-semibold">Quán ăn</p><h3 class="admin-serif text-[40px] text-[#10233a] mt-3" id="restaurant-total">0</h3></article>
            </section>
            <section class="grid gap-6 xl:grid-cols-3">
                <article class="admin-panel xl:col-span-1">
                    <div class="p-6 border-b border-[#ebf2f8]">
                        <p class="text-[11px] uppercase tracking-[0.18em] text-[#4b8bc6] font-semibold">Danh mục</p>
                        <h3 class="admin-serif text-[34px] text-[#10233a] mt-2">Food Regions</h3>
                    </div>
                    <div class="admin-table-wrap">
                        <table class="admin-table" id="food-regions-table">
                            <thead><tr><th>Tên vùng</th><th>Slug</th><th>Trạng thái</th></tr></thead>
                            <tbody id="food-region-table-body"></tbody>
                        </table>
                    </div>
                </article>
                <article class="admin-panel xl:col-span-1">
                    <div class="p-6 border-b border-[#ebf2f8]">
                        <p class="text-[11px] uppercase tracking-[0.18em] text-[#4b8bc6] font-semibold">Món ăn</p>
                        <h3 class="admin-serif text-[34px] text-[#10233a] mt-2">Dishes</h3>
                    </div>
                    <div class="admin-table-wrap">
                        <table class="admin-table" id="dishes-table">
                            <thead><tr><th>Tên món</th><th>Khu vực</th><th>Giá</th></tr></thead>
                            <tbody id="dish-table-body"></tbody>
                        </table>
                    </div>
                </article>
                <article class="admin-panel xl:col-span-1">
                    <div class="p-6 border-b border-[#ebf2f8]">
                        <p class="text-[11px] uppercase tracking-[0.18em] text-[#4b8bc6] font-semibold">Quán ăn</p>
                        <h3 class="admin-serif text-[34px] text-[#10233a] mt-2">Restaurants</h3>
                    </div>
                    <div class="admin-table-wrap">
                        <table class="admin-table" id="restaurants-table">
                            <thead><tr><th>Tên quán</th><th>Khu vực</th><th>Rating</th></tr></thead>
                            <tbody id="restaurant-table-body"></tbody>
                        </table>
                    </div>
                </article>
            </section>
        `;
    },

    statusPill(status) {
        const normalized = String(status || "draft").toLowerCase();
        const tone = normalized === "published" ? "published" : normalized === "draft" ? "draft" : "default";
        return `<span class="admin-pill admin-pill--${tone}">${normalized}</span>`;
    },

    regionRow(item) {
        return `<tr><td class="font-semibold text-[#10233a]">${item.name || ""}</td><td>${item.slug || ""}</td><td>${View.statusPill(item.status)}</td></tr>`;
    },

    dishRow(item) {
        return `<tr><td class="font-semibold text-[#10233a]">${item.name || ""}</td><td>${item.province_or_city || "Chưa có"}</td><td>${item.price_range || "N/A"}</td></tr>`;
    },

    restaurantRow(item) {
        return `<tr><td class="font-semibold text-[#10233a]">${item.name || ""}</td><td>${item.province_or_city || "Chưa có"}</td><td>${item.rating || "N/A"}</td></tr>`;
    },

    renderRows(selector, items, renderer, colspan, emptyText) {
        if (!items.length) {
            $(selector).html(`<tr><td colspan="${colspan}"><div class="admin-empty-state">${emptyText}</div></td></tr>`);
            return;
        }

        $(selector).html(items.map(renderer).join(""));
    },
};

(() => {
    const root = document.getElementById("admin-screen-root");
    if (!root) return;

    root.innerHTML = View.shell();

    Api.FoodRegion.GetAll()
        .done((response) => {
            const data = response.data || {};
            const meta = response.meta || {};
            $("#food-region-total").text(meta.total_regions || 0);
            $("#dish-total").text(meta.total_dishes || 0);
            $("#restaurant-total").text(meta.total_restaurants || 0);

            View.renderRows("#food-region-table-body", data.regions || [], View.regionRow, 3, "Chưa có vùng ẩm thực.");
            View.renderRows("#dish-table-body", data.dishes || [], View.dishRow, 3, "Chưa có món ăn.");
            View.renderRows("#restaurant-table-body", data.restaurants || [], View.restaurantRow, 3, "Chưa có quán ăn.");

            AdminDataTable.mount({
                selector: "#food-regions-table",
                pageLength: 5,
                zeroRecords: "Chưa có vùng ẩm thực",
                emptyTable: "Chưa có vùng ẩm thực",
            });
            AdminDataTable.mount({
                selector: "#dishes-table",
                pageLength: 5,
                zeroRecords: "Chưa có món ăn",
                emptyTable: "Chưa có món ăn",
            });
            AdminDataTable.mount({
                selector: "#restaurants-table",
                pageLength: 5,
                zeroRecords: "Chưa có quán ăn",
                emptyTable: "Chưa có quán ăn",
            });
        })
        .fail(() => {
            root.innerHTML = `<div class="admin-panel admin-empty-state">Không tải được dữ liệu ẩm thực vùng miền.</div>`;
        });
})();
