$(function () {
    $("#contactForm input, #contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {},
        submitSuccess: function ($form, event) {
            event.preventDefault();
            var name = $("input#name").val();
            var email = $("input#email").val();
            var subject = $("input#subject").val();
            var message = $("textarea#message").val();
            $this = $("#sendMessageButton");
            $this.prop("disabled", true);
            mailer(name, email, subject, message);
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$("#name").focus(function () {
    $("#success").html("");
});

const mailer = async (name, email, subject, message) => {
    const template = await fetch(
        window.location.origin + "/mail/template.html"
    );
    const mail = await template.text();

    const parser = new DOMParser();
    const mailCode = parser.parseFromString(mail, "text/html");
    mailCode.querySelector(
        "#heading"
    ).innerHTML = `<strong>Hi, I'm your Personal Assistant,<br />Notifying you something important!...</strong >`;

    mailCode.querySelector(
        "#p1"
    ).innerHTML = `I have found a enquiry mail from <a href="mailto:${email}" style="text-decoration: none">${name}</a>. Below is a message in detail`;

    mailCode.querySelector(
        "#p2"
    ).innerHTML = `Subject:</br>  <strong>${subject}</strong>.`;

    mailCode.querySelector(
        "#p3"
    ).innerHTML = `Message:</br>  <strong>${message}</strong>`;

    mailCode.querySelector("#date").textContent = new Date();
    const finalMailHtml = mailCode.documentElement.outerHTML;
    // console.log(finalMailHtml);
    const mailObj = {
        subject: ` Enquiry email from ${name} on ${new Date()}`,
        bodyHtml: finalMailHtml,
        bodyPlain: `Hi, I've found a enquiry mail from ${name} from ${email} on ${new Date()}. Message conveys as follows Subject: ${subject} and Message: ${message}. Thats it, Thanks for having me Sudheer. Regards, Tech Bot`,
    };

    var recaptoken = $("#capctchaResToken").val();
    var data = {
        service_id: "service_hxc0svr",
        template_id: "template_gpb89th",
        user_id: "1rydYNLjDt4rAYSHF",
        contentType: false, // auto-detection
        processData: false, // no need to parse formData to string
        accessToken: "WJbPIQD6fwGbvss_ju9_0",
        template_params: {
            username: "Sudheer",
            message: "hello i am testing",
            "g-recaptcha-response": recaptoken,
        },
    };

    const mailData = JSON.stringify(data);
    $.ajax({
        url: "https://api.emailjs.com/api/v1.0/email/send",
        type: "POST",
        data: mailData,
        cache: false,
        success: function () {
            $("#success").html("<div class='alert alert-success'>");
            $("#success > .alert-success")
                .html(
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                )
                .append("</button>");
            $("#success > .alert-success").append(
                "<strong>Your message has been sent. </strong>"
            );
            $("#success > .alert-success").append("</div>");
            $("#contactForm").trigger("reset");
        },
        error: function (error) {
            console.log(error.responseText);
            $("#success").html("<div class='alert alert-danger'>");
            $("#success > .alert-danger")
                .html(
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                )
                .append("</button>");
            $("#success > .alert-danger").append(
                $("<strong>").text(
                    "Sorry " +
                        name +
                        ", it seems that our mail server is not responding. Please try again later!"
                )
            );
            $("#success > .alert-danger").append("</div>");
            $("#contactForm").trigger("reset");
        },
        complete: function () {
            setTimeout(function () {
                $this.prop("disabled", false);
            }, 1000);
        },
    });
};
