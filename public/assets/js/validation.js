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
});