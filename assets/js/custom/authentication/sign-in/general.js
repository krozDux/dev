"use strict";
var KTSigninGeneral = function() {
    var t, e, i;
    return {
        init: function() {
            var email = $.trim($("#email").val());
            var password = $.trim($("#password").val());
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Se requiere la contraseña"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), e.addEventListener("click", (function(n) {
                $.ajax({
                    url:"controlador/login.php",
                    type:"POST",
                    datatype:"json",
                    data: {email:email, password:password},
                    success: function(data){
                        if (data != "null"){
                            n.preventDefault(), i.validate().then((function(i) {
                                "Valid" == i ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0, setTimeout((function() {
                                    e.removeAttribute("data-kt-indicator"), e.disabled = !1, Swal.fire({
                                        text: "You have successfully logged in!",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then((function(e) {
                                        if (e.isConfirmed) {
                                            t.querySelector('[name="email"]').value = "", t.querySelector('[name="password"]').value = "";
                                            var i = t.getAttribute("data-kt-redirect-url");
                                            i && (location.href = i)
                                        }
                                    }))
                                }), 2e3)) : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })
                            }))
                        }
                    }
                })
                
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSigninGeneral.init()
}));