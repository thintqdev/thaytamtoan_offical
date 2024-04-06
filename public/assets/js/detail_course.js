$(document).ready(function () {
    $(".menu-item").click(function () {
        const submenu = $(this).find(".submenu");
        if (submenu.is(":hidden")) {
            submenu.show();
        } else {
            submenu.hide();
        }
    });
});
