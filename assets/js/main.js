!(function (o) {
    "use strict";
    if (
        (o(window).scroll(function () {
            o(this).scrollTop() > 200
                ? o(".navbar").fadeIn("slow").css("display", "flex")
                : o(".navbar").fadeOut("slow").css("display", "none");
        }),
        o(".navbar-nav a").on("click", function (t) {
            "" !== this.hash &&
                (t.preventDefault(),
                o("html, body").animate(
                    { scrollTop: o(this.hash).offset().top - 45 },
                    1500,
                    "easeInOutExpo"
                ),
                o(this).parents(".navbar-nav").length &&
                    (o(".navbar-nav .active").removeClass("active"),
                    o(this).closest("a").addClass("active")));
        }),
        1 == o(".typed-text-output").length)
    ) {
        var t = o(".typed-text").text();
        new Typed(".typed-text-output", {
            strings: t.split(", "),
            typeSpeed: 100,
            backSpeed: 20,
            smartBackspace: !1,
            loop: !0,
        });
    }
    o(document).ready(function () {
        var t;
        o(".btn-play").click(function () {
            t = o(this).data("src");
        }),
            // console.log(t),
            o("#videoModal").on("shown.bs.modal", function (a) {
                o("#video").attr(
                    "src",
                    t + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
                );
            }),
            o("#videoModal").on("hide.bs.modal", function (a) {
                o("#video").attr("src", t);
            });
    }),
        o(window).scroll(function () {
            o(this).scrollTop() > 100
                ? o(".scroll-to-bottom").fadeOut("slow")
                : o(".scroll-to-bottom").fadeIn("slow");
        }),
        o(".skill").waypoint(
            function () {
                o(".progress .progress-bar").each(function () {
                    o(this).css("width", o(this).attr("aria-valuenow") + "%");
                });
            },
            { offset: "80%" }
        );
    var a = o(".portfolio-container").isotope({
        itemSelector: ".portfolio-item",
        layoutMode: "fitRows",
    });
    o("#portfolio-flters li").on("click", function () {
        o("#portfolio-flters li").removeClass("active"),
            o(this).addClass("active"),
            a.isotope({ filter: o(this).data("filter") });
    }),
        o(window).scroll(function () {
            o(this).scrollTop() > 200
                ? o(".back-to-top").fadeIn("slow")
                : o(".back-to-top").fadeOut("slow");
        }),
        o(".back-to-top").click(function () {
            return (
                o("html, body").animate(
                    { scrollTop: 0 },
                    1500,
                    "easeInOutExpo"
                ),
                !1
            );
        }),
        o(".testimonial-carousel").owlCarousel({
            autoplay: !0,
            smartSpeed: 1500,
            dots: !0,
            loop: !0,
            items: 1,
        });
})(jQuery);
