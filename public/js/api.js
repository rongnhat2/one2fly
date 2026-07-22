const Api = {
    Dashboard: {},
    Destination: {},
    Explore: {},
    Issue: {},
    FoodRegion: {},
    Article: {},
    Offer: {},
};

window.Api = Api;

// Dashboard
(() => {
    Api.Dashboard.GetAll = () =>
        $.ajax({
            url: `/api/admin/dashboard/get`,
            method: "GET",
        });
})();

// Destinations
(() => {
    Api.Destination.GetAll = () =>
        $.ajax({
            url: `/api/admin/destination/get`,
            method: "GET",
        });
})();

// Explore
(() => {
    Api.Explore.GetAll = () =>
        $.ajax({
            url: `/api/admin/explore/get`,
            method: "GET",
        });
})();

// Issues
(() => {
    Api.Issue.GetAll = () =>
        $.ajax({
            url: `/api/admin/issue/get`,
            method: "GET",
        });
})();

// Food Regions
(() => {
    Api.FoodRegion.GetAll = () =>
        $.ajax({
            url: `/api/admin/food-region/get`,
            method: "GET",
        });
})();

// Articles
(() => {
    Api.Article.GetAll = () =>
        $.ajax({
            url: `/api/admin/article/get`,
            method: "GET",
        });
})();

// Offers
(() => {
    Api.Offer.GetAll = () =>
        $.ajax({
            url: `/api/admin/offer/get`,
            method: "GET",
        });
})();
