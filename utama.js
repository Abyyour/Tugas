var contactAddress = "mhmmdabil828&#64;gmail&#46;com";

$(document).ready(function() {
    $("#topNav a.section-toggle").click(function(event) {
        event.preventDefault();
        if ($(this).hasClass("active")) return false;
        $("#topNav a").removeClass("active");
        $(this).addClass("active");
        $(".section").hide();
        $($(this).attr("data-section-id")).fadeIn("fast");
    });
});
