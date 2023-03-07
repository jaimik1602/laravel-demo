$(document).ready(function () {
    getPosts();
    
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
                        '<td>' +
                        '<button class="btn btn-success m-1 edit-post" data-id="' + value["id"] + '">Edit</button>' +
                        '<button class="btn btn-danger m-1 delete-post" data-id="' + value["id"] + '">Delete</button>' +
                        '</td>' +
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
                $('#createPostForm').trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).on('click', '.edit-post', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'edit/' + $(this).attr('data-id'),
            type: 'GET',
            success: function (result) {
                console.log(result);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});