$(function() {

    //mobile-nav-toggle switch
    $("#mobile-nav-toggle").on("click", function() {
        $(this).toggleClass("is-open");

        if($(this).hasClass("is-open")) {
            $("#navigation").fadeIn("300");
        } else {
            $("#navigation").fadeOut("300");
        }
    });

    // form validation
    $("#contact-form").on("submit", function(e) {
        e.preventDefault();

        // let formValid = validateForm();
        let formValid = true;

        //if form is valid, call Ajax and try to send the mail
        if(formValid) {
            $.ajax({
                type: "POST",
                url: "ajax/sentMail.php",
                dataType: "json",
                data: {
                    nameInput: $("#nameInput").val(),
                    emailInput: $("#emailInput").val(),
                    subjectInput: $("#subjectInput").val(),
                    messageInput: $("#messageInput").val()
                }
            }).done(function(response) {

                let nameInput = $("#nameInput");
                let emailInput = $("#emailInput");
                let subjectInput = $("#subjectInput");
                let messageInput = $("#messageInput");

                if(response.code === 0) {
                    if(response.errorMsg) {
                        alert(response.errorMsg);
                    }

                    if(response.formErrors) {

                        if(response.formErrors.nameInput) {
                            addError(nameInput, response.formErrors.nameInput);
                        } else {
                            removeError(nameInput);
                        }

                        if(response.formErrors.emailInput) {
                            addError(emailInput, response.formErrors.emailInput);
                        } else {
                            removeError(emailInput);
                        }

                        if(response.formErrors.subjectInput) {
                            addError(subjectInput, response.formErrors.subjectInput);
                        } else {
                            removeError(subjectInput);
                        }

                        if(response.formErrors.messageInput) {
                            addError(messageInput, response.formErrors.messageInput);
                        } else {
                            removeError(messageInput);
                        }
                    }
                } else {
                    $("#contact-form")[0].reset();
                    removeError(nameInput);
                    removeError(emailInput);
                    removeError(subjectInput);
                    removeError(messageInput);
                    alert("Votre message a bien été envoyé.");
                }
            });
        }
    });
});

function validateForm() {
    //some variables
    let nameInput = $("#nameInput");
    let emailInput = $("#emailInput");
    let subjectInput = $("#subjectInput");
    let messageInput = $("#messageInput");

    let emailRegex = /(.+)@(.+){2,}\.(.+){2,}/;
    let formValid = true;

    //get values
    let name = nameInput.val();
    let email = emailInput.val();
    let subject = subjectInput.val();
    let message = messageInput.val();

    //validate name
    if(!name) {
        formValid = false;
        addError(nameInput, "Veuillez renseigner votre nom complet.");
    } else if(name.length < 4) {
        formValid = false;
        addError(nameInput, "Votre nom doit contenir au moins 4 caractères.");
    } else {
        removeError(nameInput);
    }

    if(!email) {
        formValid = false;
        addError(emailInput, "Veuillez renseigner votre adresse email.");
    } else if(!emailRegex.test(email)) {
        formValid = false;
        addError(emailInput, "Veuillez renseigner une adresse email valide.");
    } else {
        removeError(emailInput);
    }

    if(!subject) {
        formValid = false;
        addError(subjectInput, "Veuillez renseigner un sujet.");
    } else if(subject.length < 5) {
        formValid = false;
        addError(subjectInput, "Le sujet doit contenir au moins 5 caractères.");
    } else {
        removeError(subjectInput);
    }

    if(!message) {
        formValid = false;
        addError(messageInput, "Veuillez entrez votre message.");
    } else if(message.length < 20) {
        formValid = false;
        addError(messageInput, "Votre message doit contenir au moins 20 caractères.");
    } else {
        removeError(messageInput);
    }

    return formValid;
}

//helper functions to display/hide errors
function addError(inputField, errorMsg) {
    inputField.addClass("has-error");
    inputField.next().text(errorMsg);
}

function removeError(inputField) {
    inputField.removeClass("has-error");
    inputField.next().text("");
}
