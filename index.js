$(document).ready(() => {
    // disable scrolling until loader complete task with with css
    $("body").addClass("stopScrolling");
    function recaptchaCallback() {
        $("#sendMessageButton").removeAttr("disabled");
    }
    // hides loader after 2 sec
    setTimeout(() => {
        $("#loader").hide();
        $("body").removeClass("stopScrolling"); //enable scrolling
        setTimeout(() => {
            $(".toast").toast("show");
        }, 4000);
    }, 2000);
    $("#test").click(() => {
        console.log("sending mail");
        // code fragment
        // emailjs.send("service_hxc0svr", "template_gpb89th", {
        //     from_name: "Sudheer Website",
        //     to_name: "Sudheer",
        //     message: "Hello",
        // });
        console.log("mail req sent");
    });
});
