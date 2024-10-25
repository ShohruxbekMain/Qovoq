$(document).ready(function () {
    // Avval submit tugmasini disabled qilish
    $('#submitBtn').prop('disabled', true);

    // Checkboxni tekshirish
    $('#termsAccepted').on('change', function () {
        if ($(this).is(':checked')) {
            // Agar checkbox checked bo'lsa submit tugmasini faollashtiramiz
            $('#submitBtn').prop('disabled', false);
        } else {
            // Agar checkbox unchecked bo'lsa submit tugmasini yana disabled qilamiz
            $('#submitBtn').prop('disabled', true);
        }
    });


    // var csrfToken = '<?= $_SESSION["csrf_token"]; ?>'; // PHP dan CSRF tokenini olish

    $('#email').on('input', function() { // Email inputiga input hodisasi
        var email = $(this).val(); // Email inputdan qiymatni oling
        handleEmailValidation(email); // Emailni tekshirish
    });

    // Boshqa inputlar uchun xato xabarlarini ko'rsatish
    $('input#email').on('blur', function() {
        validateField($(this)); // Har bir inputni tekshirish
    });

    function handleEmailValidation(email) {
        if (email) {
            $.ajax({
                url: '/check-email', // Emailni tekshirish uchun serverga so'rov yuborish
                type: 'POST',
                data: {
                    email: email,
                    // csrf_token: csrfToken // CSRF tokenini yuborish
                },
                success: function(response) {
                    const data = JSON.parse(response); // JSON formatida javobni olish
                    if (data.status === 'error') {
                        showError($('#email'), data.message); // Xato xabarini ko'rsatish
                    } else {
                        hideError($('#email')); // Xato xabarini yashirish
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed: ', error); // AJAX so'rovi muvaffaqiyatsiz bo'lsa
                }
            });
        } else {
            hideError($('#email')); // Email bo'sh bo'lsa, xato xabarini yashirish
        }
    }

    function showError(inputElement, message) {
        inputElement.addClass('is-invalid'); // Email inputini invalid qiling
        inputElement.next('label').addClass('is-invalid'); // Label uchun ham xato ko'rsating
        inputElement.siblings('.invalid-feedback').text(message).show(); // Xato xabarini ko'rsatish
    }

    function hideError(inputElement) {
        inputElement.removeClass('is-invalid'); // Email inputini to'g'ri qiling
        inputElement.next('label').removeClass('is-invalid'); // Labelni to'g'ri qiling
        inputElement.siblings('.invalid-feedback').hide(); // Xato xabarini yashirish
    }

    function validateField(inputElement) {
        if (inputElement.val() === '') {
            showError(inputElement, 'This field is required. 55'); // Xato xabarini ko'rsatish
        } else {
            hideError(inputElement); // Xato xabarini yashirish
        }
    }

    // console.log('CSRF Token:', csrfToken);
});