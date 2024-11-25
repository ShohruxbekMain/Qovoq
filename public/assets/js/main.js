$.fn.showFlex = function () {
    this.css('display', 'flex');
}

function setupPasswordValidation() {
    // Hodisalarni qayta bog'lash funksiyasi
    $('#password').on('focus', function () {
        $('.password-required').slideDown();
    });

    $('#password').on('blur', function () {
        $('.password-required').slideUp();
    });

    $('#password').on('keyup', function () {
        let passValue = $(this).val();
        // Min length dynamically fetched from hidden input
        let minLength = parseInt($('#minPasswordLength').val(), 10);
        let maxLength = parseInt($('#maxPasswordLength').val(), 10);

        function toggleClass(condition, selector) {
            if (condition) {
                $(selector).addClass('active');
            } else {
                $(selector).removeClass('active');
            }
        }

        toggleClass(/[a-z]/.test(passValue), '.lowercase');
        toggleClass(/[A-Z]/.test(passValue), '.capital');
        toggleClass(/[0-9]/.test(passValue), '.number');
        toggleClass(/[!@#$%^&*]/.test(passValue), '.special');
        toggleClass(passValue.length >= minLength, '.min-limit'); // Dinamik min length
        toggleClass(passValue.length > 0 && passValue.length <= maxLength, '.max-limit'); // Dinamik min length
    });
}

function setupPasswordShow() {
    $(".show-password, .hide-password").on('click', function () {
        // var passwordId = $(this).parents('.form-floating').find('input').attr('id');

        var passwordField = $(this).closest('.form-floating').find('input');
        if ($(this).hasClass('show-password')) {

            // $("#" + passwordId).attr("type", "text");

            passwordField.attr("type", "text");
            // $(this).parent().find(".show-password").hide();
            // $(this).parent().find(".hide-password").show({
            //     duration: 250,
            //     start: function () {
            //         $(this).css('display', 'flex');
            //     }
            // });

            $(this).hide();
            $(this).siblings(".hide-password").show({
                duration: 250, start: function () {
                    $(this).css('display', 'flex');
                }
            });
            $('.password-required').slideDown();
            if ($('.password-required').slideDown()) {
                $(document).click(function (e) {

                    // Check if click was triggered on or within #menu_content
                    if ($(e.target).closest("#password, .password-showhide").length > 0) {
                        return false;
                    }

                    $('.password-required').slideUp();

                    // Otherwise
                    // trigger your click function
                });
            }

            // $(this).parent().find(".hide-password").show().css('display', 'flex');
            // $(this).parent().find(".hide-password").showFlex();
        } else {
            // $("#" + passwordId).attr("type", "password");
            passwordField.attr("type", "password");
            // $(this).parent().find(".hide-password").hide();
            // $(this).parent().find(".show-password").show({
            //     duration: 250,
            //     start: function () {
            //         $(this).css('display', 'flex');
            //     }
            // });

            $(this).hide();
            $(this).siblings(".show-password").show({
                duration: 250, start: function () {
                    $(this).css('display', 'flex');
                }
            });
            $('.password-required').slideDown();

            // $(this).parent().find(".show-password").show().css('display', 'flex');
            // $(this).parent().find(".show-password").showFlex();
        }
    });

    // Confirm Password uchun icon ko'rsatish/berkitish
    $(".show-confirm-password, .hide-confirm-password").on('click', function () {
        var confirmPasswordField = $(this).closest('.form-floating').find('input');

        if ($(this).hasClass('show-confirm-password')) {
            confirmPasswordField.attr("type", "text"); // Confirm parolni ko'rsatish
            $(this).hide(); // Show iconni yashirish
            $(this).siblings(".hide-confirm-password").show({
                duration: 250, start: function () {
                    $(this).css('display', 'flex');
                }
            }); // Hide iconni ko'rsatish
        } else {
            confirmPasswordField.attr("type", "password"); // Confirm parolni berkitish
            $(this).hide(); // Hide iconni yashirish
            $(this).siblings(".show-confirm-password").show({
                duration: 250, start: function () {
                    $(this).css('display', 'flex');
                }
            }); // Show iconni ko'rsatish
        }
    });
}

function setGridList() {
    $('#list').click(function (event) {
        event.preventDefault();
        $('#products').addClass('list-group-wrapper').removeClass('grid-group-wrapper');
    });
    $('#grid').click(function (event) {
        event.preventDefault();
        $('#products').removeClass('list-group-wrapper').addClass('grid-group-wrapper');
    });
}

function gridListBtn() {
    $('.list-grid-toggle').click(function () {
        var txt = $(".icon").hasClass('icon-grid') ? 'List' : 'Grid';
        $('.icon').toggleClass('icon-grid');
        $(".label").text(txt);
    })

/*    $('.list-grid-toggle').click(function(event) {
        event.preventDefault();
        $('.icon').toggleClass('icon-grid');
    });*/
}

// Sahifa yangilanganidan keyin hodisalarni qayta yuklatish kerak
$(document).ready(function () {
    setupPasswordValidation();  // Sahifa birinchi marta yuklanganda
    setupPasswordShow();
    setGridList();
    gridListBtn();

    // $("#icon-show").click(function () {
    //     $(this).toggleClass("bx bx-show bx bx-hide");
    //     var type = $(this).hasClass("bx bx-hide") ? "text" : "password";
    //     $("#password").attr("type", type);
    // });

});

// Har safar partial view qayta yuklanganda chaqirish kerak
$(document).ajaxComplete(function () {
    setupPasswordValidation();  // Partial view yoki Ajax responsedan keyin qayta yuklash
    setupPasswordShow();
    setGridList();
    gridListBtn();
});
