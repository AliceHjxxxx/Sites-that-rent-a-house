$(document).ready(function () {
    "use strict";
    $("#userInfo").mousedown(function () {
        if ($("#userInfo i").hasClass("fa-check-square-o") === false) {
            $("#userInfo i").removeClass("fa-square-o");
            $("#userInfo i").addClass("fa-check-square-o");
            $("#apartmentInfo i").removeClass("fa-check-square-o");
            $("#apartmentInfo i").addClass("fa-square-o");
           $("#apartmentTab").attr("style", "display:none");
            $("#userTab").fadeIn(1000);
        }
    });
    $("#apartmentInfo").click(function () {
         if ($("#apartmentInfo i").hasClass("fa-check-square-o") === false) {
            $("#apartmentInfo i").removeClass("fa-square-o");
            $("#apartmentInfo i").addClass("fa-check-square-o");
            $("#userInfo i").removeClass("fa-check-square-o");
            $("#userInfo i").addClass("fa-square-o");
            $("#userTab").attr("style", "display:none"); 
            $("#apartmentTab").fadeIn(1000);
        }
    });    

});
