$(document).ready(function () {
  $("td").click(function () {
    let className = $(this).attr("class");

    if (className) {
      let targetId = "#" + className;
      $("html, body").animate(
        {
          scrollTop: $(targetId).offset().top,
        },
        1000
      );
    }
  });

  $('input[type="radio"]').change(function () {
    var doneQuestionCount = $('input[type="radio"]:checked').length;
    $(".total-done").text("Số câu đã làm: " + doneQuestionCount + "/50");

    var selectedOption = $(this).val();
    var question = $(this).closest(".choices").data("question");

    if (selectedOption) {
      $(".table-statistics")
        .find('td[class="' + question + '"]')
        .each(function () {
          if (selectedOption) {
            $(this).addClass("question-done");
          }
        });
    }
  });

  $('#detailExam').hide();

  $('#buttonStart').click(function () {
    $('#detailExam').show();

    let timeRemaining = 90 * 60;

    function updateCountdown() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        $('#countdown').text(`${minutes}:${seconds < 10 ? '0' : ''}${seconds}`);

        if (timeRemaining > 0) {
            timeRemaining--;
        } else {
            alert("Hết thời gian!");
            clearInterval(countdownInterval);
        }
    }

    const countdownInterval = setInterval(updateCountdown, 1000);

    $(this).prop('disabled', true).hide();
});
});
