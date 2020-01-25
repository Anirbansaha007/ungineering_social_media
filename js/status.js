$(document).ready(function () {
    $('.form_fillup').submit(function() {
        var url = "status_submit.php";
        var data = $('.form_fillup').serialize();
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: registration_success,
            error: on_error
        });
        return false;
    });
});

var registration_success = function (response) {
    response = JSON.parse(response);

    if (response.success) {
        //window.location.href = "homepage.php";
        var html = "<div class=\"br\">
                        <div class=\"b1\">
                            <h4>"+response.name+"</h4>
                        </div>
                        <div class=\"b2\">
                            "+response.status+"
                        </div>
                        <div class=\"b3\">
                            "+response.time+"
                        </div>
                    </div>";
        $(".status_show").prepend(html);
        //$(".status_show").prepend(response.html);

    } else {
        alert(response.message);
    }
};

var on_error = function () {
    alert("something went wrong");
};


                                

