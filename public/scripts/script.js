$(document).ready(function () {
    $('#form-category').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/data/addajax.php',
            method: 'post',
            dataType: 'html',
            data: $('#form-category').serialize(),
            success: function () {
                alert('Категория успешно добаввлена');
            }
        });
    });
});