$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    $('#fetchData').on('click', function () {
        $.ajax({
            url: 'get-data',
            method: 'GET',
            success: function (result) {
                $('.records').text(result)
                console.log(result);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#createPostForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'posts',
            method: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                console.log(result);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});