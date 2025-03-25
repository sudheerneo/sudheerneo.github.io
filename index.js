// $(document).ready(() => {
//   // disable scrolling until loader complete task with with css
//   $("body").addClass("stopScrolling");
//   // go fullscreen
//   $(".fulscreenBtn").click(() => {
//     goFullscreen();
//     $(".toast").toast("hide");
//   });
//   $(document).keyup((e) => {
//     e.key.toLowerCase() === "enter" ? goFullscreen() : 0;
//   });
//   $(".toast").toast("show");
//   // hides loader after 2 sec
//   console.log("hide timer started");
//   setTimeout(() => {
//     $(".loader").hide();
//     console.log("loading hidden now");

//     $("body").removeClass("stopScrolling"); //enable scrolling
//   }, 5000);
// });

const goFullscreen = () => {
  const body = document.documentElement;
  body.requestFullScreen
    ? body.requestFullscreen()
    : body.webkitRequestFullscreen
    ? body.webkitRequestFullscreen()
    : body.msRequestFullscreen
    ? body.msRequestFullscreen()
    : body.mozRequestFullscreen
    ? body.mozRequestFullscreen()
    : 0;
};

function recaptchaCallback(response) {
  $("#capctchaResToken").val(response);
  $("#sendMessageButton").removeAttr("disabled");
  $("#sendMessageButton").removeClass("btn-secondary");
  $("#sendMessageButton").addClass("btn-outline-primary");
  $(".g-recaptcha").hide();
}
