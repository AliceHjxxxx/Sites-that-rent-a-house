$(document).ready(function(){
    "use strict";
    $("#searchBtn").click(function(){
        $("#rightBtm").empty();
        $.post("result.php",
              {addr:$("#addrInput").val()},
              function(data){
            $("#rightBtm").append(data);
        });
    });
});