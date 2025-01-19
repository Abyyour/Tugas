var contactAddress = "con"+"tac"+"t&#64;c"+"hri"+"sbir"+"on&#46;c"+"om";

$(document).ready(function(){
    $("#topNav a.section-toggle").click(function(event){
        event.preventDefault();
        if ($(this).hasClass("active")) return false;
        $("#topNav a").removeClass("active");
        $(this).addClass("active");
        $(".section").hide();
        $($(this).attr("data-section-id")).fadeIn("fast");
    });
});