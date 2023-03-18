$(document).ready(() => {
  $("#liveToastBtn").on("click", function () {
    const toast = new bootstrap.Toast($("#liveToast"));
    toast.show();
  });
});
