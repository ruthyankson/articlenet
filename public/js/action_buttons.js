$(document).ready(function() {
    let deleteUrl = '';

    // Handle form submission for adding/updating articles
    $('#articleForm').submit(function(event) {
        event.preventDefault();
        let form = $(this);
        let actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#articleModal').modal('hide');
                    location.reload(); // Reload the page to see the updated article
                } else {
                    // Display validation errors
                    let errors = response.errors;
                    for (let field in errors) {
                        let error = errors[field];
                        $('#' + field).addClass('is-invalid');
                        $('#' + field + '-error').text(error).show();
                    }
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });

    // Handle the delete button click
    $(document).on('click', '.delete-btn', function() {
        deleteUrl = $(this).data('url');
        $('#deleteModal').modal('show');
    });

    // Handle the confirm delete button click
    $('#confirmDeleteBtn').click(function() {
        $.ajax({
            type: "POST",
            url: deleteUrl,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#deleteModal').modal('hide');
                    location.reload(); // Reload the page to see the updated article list
                } else {
                    alert('An error occurred while deleting the article.');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });

    // Clear validation errors on input focus
    $('input, textarea').focus(function() {
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').hide();
    });
});

function openModal(action, id = '', title = '', body = '', writer = '') {
    clearValidationErrors();

    if (action === 'create') {
        $('#articleModalLabel').text('Add New Article');
        $('#articleForm').attr('action', '/articles/store');
        $('#articleId').val('');
        $('#title').val('');
        $('#body').val('');
        $('#writer').val('');
    } else if (action === 'edit') {
        $('#articleModalLabel').text('Edit Article');
        $('#articleForm').attr('action', '/articles/update/' + id);
        $('#articleId').val(id);
        $('#title').val(title);
        $('#body').val(body);
        $('#writer').val(writer);
    }
    
    $('#articleModal').modal('show');
}

function clearValidationErrors() {
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').hide().text('');
}
