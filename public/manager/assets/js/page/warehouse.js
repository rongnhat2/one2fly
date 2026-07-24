// Định nghĩa đối tượng View chứa các logic quản lý giao diện sản phẩm
const View = {
    Tab: {
        onChange(callback) {
            $(".list-group-item").on("click", function () {
                var tab = $(this).attr("data-tab");
                callback(tab);
            });
        },
        default(tab) {
            $(".group-item").addClass("d-none");
            $(`#${tab}`).removeClass("d-none");

            $(".list-group-item").removeClass("active");
            $(`.list-group-item[data-tab=${tab}]`).addClass("active");
        },
    },
    // Khởi tạo các phần của giao diện sản phẩm
    init() {},
};

// Hàm khởi động toàn bộ chức năng View
(() => {
    View.init();
    function init() {}

    View.Tab.onChange(function (tab) {
        View.Tab.default(tab);
    });

    init();
})();
