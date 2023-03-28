() => {
    emailjs.init("1rydYNLjDt4rAYSHF");
};
$(document).ready(() => {
    // disable scrolling until loader complete task with with css
    $("body").addClass("stopScrolling");

    // hides loader after 2 sec
    setTimeout(() => {
        $("#loader").hide();
        $("body").removeClass("stopScrolling"); //enable scrolling
        setTimeout(() => {
            $(".toast").toast("show");
        }, 4000);
    }, 2000);
});
function recaptchaCallback(response) {
    $("#capctchaResToken").val(response);
    $("#sendMessageButton").removeAttr("disabled");
    $("#sendMessageButton").removeClass("btn-secondary");
    $("#sendMessageButton").addClass("btn-outline-primary");
    $(".g-recaptcha").hide();
}
