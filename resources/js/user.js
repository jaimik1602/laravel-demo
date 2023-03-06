$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    function getPosts() {
        $.ajax({
            url: 'posts',
            method: 'GET',
            success: function (result) {
                $.each(result, function (key, value) {
                    $('#posts').append('<tr>' +
                        '<td>' + value["id"] + '</td>' +
                        '<td>' + value["name"] + '</td>' +
                        '<td> <img src="' + value["image"] + '" width="70px"> </td>' +
                        '</tr>');
                })
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    $('#createPostForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'posts',
            type: 'POST',
            // data: $(this).serialize(),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (result) {
                $('#posts').append('<tr>' +
                    '<td>' + result['id'] + '</td>' +
                    '<td>' + result['name'] + '</td>' +
                    '<td> <img src="' + result['image'] + '" width="70px"> </td>' +
                    '</tr>');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    getPosts();
});