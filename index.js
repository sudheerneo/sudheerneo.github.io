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
