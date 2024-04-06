$(document).ready(function () {
  $("#sidebarCollapse, #sidebarCollapseX").on("click", function () {
    $("#sidebar").toggleClass("active");
    if ($("#sidebar").hasClass("active")) {
      $(".overlay").addClass("visible");
    } else {
      $(".overlay").removeClass("visible");
    }
  });

  $("#carouselExampleIndicators").carousel();

  // Enable Carousel Indicators
  $(".carousel-indicators li").click(function () {
    $("#carouselExampleIndicators").carousel(
      parseInt($(this).attr("data-slide-to"))
    );
  });

  // Enable Carousel Controls
  $(".carousel-control-prev").click(function () {
    $("#carouselExampleIndicators").carousel("prev");
  });

  $(".carousel-control-next").click(function () {
    $("#carouselExampleIndicators").carousel("next");
  });

  $("#dropdownNotificationList").click(function () {
    $("#notificationDropdownMenu").toggle(); // Hiển thị hoặc ẩn dropdown menu cho notificationList
    $("#userDropdownMenu").hide(); // Ẩn dropdown menu cho dropdownMenuButton nếu đang mở
  });

  $("#dropdownMenuButton").click(function () {
    $("#userDropdownMenu").toggle(); // Hiển thị hoặc ẩn dropdown menu cho dropdownMenuButton
    $("#notificationDropdownMenu").hide(); // Ẩn dropdown menu cho notificationList nếu đang mở
  });

  $(document).on("click", function (event) {
    if (
      !$(event.target).closest("#dropdownNotificationList, #dropdownMenuButton")
        .length
    ) {
      $(".dropdown-menu").hide();
    }
  });

  $(".dropdown-menu").on("click", function (event) {
    event.stopPropagation();
  });
});
