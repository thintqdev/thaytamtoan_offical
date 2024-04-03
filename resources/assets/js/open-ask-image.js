// Lấy các phần tử cần sử dụng
var modal = document.getElementById("imageModal");
var modalImage = document.getElementById("modalAskImage");
var modalTriggers = document.querySelectorAll(".modal-trigger");
var close = document.getElementsByClassName("close")[0];

// Xử lý sự kiện click cho từng ảnh
modalTriggers.forEach(function (trigger) {
    trigger.addEventListener("click", function () {
        modal.style.display = "block";
        modalImage.src = this.src;
    });
});

// Xử lý sự kiện click để đóng modal
close.addEventListener("click", function () {
    modal.style.display = "none";
});

// Đóng modal khi click ra ngoài nó
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
