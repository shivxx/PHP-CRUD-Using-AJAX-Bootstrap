$(document).ready(function () {
    fetchUsers();

    $('#userForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let url = $('#user_id').val() ? 'update.php' : 'insert.php';
        $.post(url, formData, function () {
            $('#userModal').modal('hide');
            fetchUsers();
        });
    });
});

function fetchUsers() {
    $.post('fetch.php', function (data) {
        $('#userTable').html(data);
    });
}

function editUser(id) {
    $.post('get_user.php', { id: id }, function (res) {
        let user = JSON.parse(res);
        $('#user_id').val(user.id);
        $('#name').val(user.name);
        $('#email').val(user.email);
        new bootstrap.Modal(document.getElementById('userModal')).show();
    });
}

function deleteUser(id) {
    if (confirm("Are you sure to delete this user?")) {
        $.post('delete.php', { id: id }, function () {
            fetchUsers();
        });
    }
}

function clearForm() {
    $('#user_id').val('');
    $('#userForm')[0].reset();
}
