$(document).ready(function() {
    //---------------------LOAD DATA
    function viewData() {
        $.get("./view.php", function(data) {
            $("#load-data").html(data);
        });
    }

    $("#show-btn").click(function() {
        viewData();
    });


    //---------------------REMOVE DATA

    $("#clear-btn").on("click",  function() {
        var id = $(this).attr("value");
        var check = confirm("Are you sure to delete this car?");
        if (check) {
            $.post("./clear.php", { id: id }, function() {
                viewData();
            });
        }
    });
});