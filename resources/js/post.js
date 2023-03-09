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
                console.log(result);
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
            // data: {
            //     '_token' : $('#token').val(),
            // }
            processData: false,
            contentType: false,
            success: function (result) {
                $('#posts').html('');
                getPosts();
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
                $('#updateId').val(result.id);
                $('#name').val(result.name);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#updatePostForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'update-post/' + $('#updateId').val(),
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (result) {
                $('#posts').html('');
                getPosts();
                $('#updatePostForm').trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).on('click', '.delete-post', function (e) {
        e.preventDefault();
        let deleteConfirmation = confirm('Are you sure?');
        if (deleteConfirmation) {
            $.ajax({
                url: 'delete-post/' + $(this).attr('data-id'),
                type: 'POST',
                success: function (result) {
                    $('#posts').html('');
                    getPosts();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
});