$(document).ready(function () {
    $("#fetchData").on("click", function () {
        $.ajax({
            url: "get-data",
            method: "GET",
            success: function (result) {
                $(".records").text(result);
                console.log(result);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    
    $("#dlt").on("click", function () {
        $.ajax({
            url: "delete-user",
            method: "GET",
            success: function (result) {
                
            },
            error: function (error) {},
        });
    });
});
