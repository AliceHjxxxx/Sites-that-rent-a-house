function inputCheck() {
    "use strict";
    if (logTab.phnum.value === "") {
        alert("手机号码不能为空!");
        return false;
    } else if (logTab.psd.value === "") {
        alert("密码不能为空!");
        return false;
    } else {
        return true;
    }
}

function regCheck() {
    "use strict";
    if (regTab.name.value === "" ||
        regTab.idNum.value === "" ||
        regTab.year.value === "" ||
        regTab.month.value === "" ||
        regTab.day.value === "" ||
        regTab.email.value === "" ||
        regTab.addr.value === "" ||
        regTab.psd.value === "" ||
        regTab.psdAgain.value === "") {
        alert("请完成注册表！");
        return false;
    } else if (regTab.psd.value !== regTab.psdAgain.value) {
        alert("密码不一致！");
        return false;
    } else {
        return true;
    }
}

$("#cancelBtn, #cancelBtn2").mousedown(function () {
    "use strict";
    $(this).removeClass("fa-times-circle");
    $(this).addClass("fa-times-circle-o");
});

$("#cancelBtn, #cancelBtn2").mouseup(function () {
    "use strict";
    $(this).removeClass("fa-times-circle-o");
    $(this).addClass("fa-times-circle");
});

$("#cancelBtn").click(function () {
    "use strict";
    $("#blackOverlay").removeClass("fadeIn");
    $("#blackOverlay").addClass("fadeOut");
    setTimeout(function () {
        $("#blackOverlay").attr("style", "display:none");
        $("#loginTab").attr("style", "display:none");
    }, 1000);
});

$("#cancelBtn2").click(function () {
    "use strict";
    $("#blackOverlay").removeClass("fadeIn");
    $("#blackOverlay").addClass("fadeOut");
    setTimeout(function () {
        $("#blackOverlay").attr("style", "display:none");
        $("#registerTab").attr("style", "display:none");
    }, 1000);
});

$("#login").click(function () {
    "use strict";
    $("#blackOverlay").removeClass("fadeOut");
    $("#blackOverlay").addClass("fadeIn");
    $("#blackOverlay").attr("style", "display:flex");
    $("#loginTab").attr("style", "display:block");
    $("#loginTab form").attr("style", "display:flex");
});

$("#register").click(function () {
    "use strict";
    $("#blackOverlay").removeClass("fadeOut");
    $("#blackOverlay").addClass("fadeIn");
    $("#blackOverlay").attr("style", "display:flex");
    $("#registerTab").attr("style", "display:block");
    $("#registerTab  form").attr("style", "display:flex");
});

$(".radioInput").click(function () {
    "use strict";
    if ($(this).attr("id") === "user") {
        $("#administrator").prev().removeAttr("checked");
    }
    if ($(this).attr("id") === "administrator") {
        $("#user").prev().removeAttr("checked");
    }
    if ($(this).attr("id") === "male") {
        $("#female").prev().removeAttr("checked");
    }
    if ($(this).attr("id") === "female") {
        $("#male").prev().removeAttr("checked");
    }
    $(this).prev().attr("checked", "checked");
});
