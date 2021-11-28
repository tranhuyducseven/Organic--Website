$(document).ready(function() {
    $(".-toast").hide();
    $("#event-for-toast").on("click", function() {
        toastMessage("input here", true);
    })

    function toastMessage(msg, check) {
        if (check)
            $(".-toast").html(msg).addClass("success").fadeIn(500).fadeOut(5000);
        else
            $(".-toast").html(msg).addClass("fail").fadeIn(500).fadeOut(5000);
    }
});