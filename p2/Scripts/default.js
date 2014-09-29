$(document).ready(function () {
    //Hide div initially.
    $("#symNum").css("display", "none");
    $('h2').css("display", "none");

    $("#sym").click(function () {

        if ($("#sym").is(":checked")) {
            //show the hidden div
            $("#symNum").show();
        }
        else {
            //otherwise, hide it
            $("#symNum").hide();
        }
    });
});

