

@push('js')
    <script>
        function create() {
            $('#modal-form').modal('show');
            $('#form')[0].reset();
            $('.modal-title').text('Add User');
            $('#form_new_password').attr('hidden',true);
            method = 'store';
        }

        function store() {
            var id      = $('#id').val();
            var name    = $('#name').val();
            var nip    = $('#nip').val();
            var username    = $('#username').val();
            var password    = $('#password').val();
            var email    = $('#email').val();
            var contact    = $('#contact').val();
            $('#btnSave').text('Saving...');
            $('#btnSave').attr('disabled', true);

            var message = 'Data Added Successfully';
            if(method == 'update') {
                message = 'Data Updated Successfully';
            }

            $.ajax({
                url: "{{ route('users.store') }}",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                    name: name,
                    nip: nip,
                    username: username,
                    password: password,
                    email: email,
                    contact: contact,
                },
                success: function (data) {
                    $('#modal-form').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table.draw();
                    $('#btnSave').text('Save');
                    $('#btnSave').attr('disabled', false);
                },
                error: function (data) {
                    var error_message="";
                    error_message +="<ul>";
                    $.each( data.responseJSON.errors, function( key, value ) {
                        error_message +="<li>"+value+"</li>";
                    });
                    error_message +="</ul>";
                    iziToast.error({
                        title: 'ERROR !',
                        message: error_message,
                        position: 'topRight'
                    });

                    $('#btnSave').text('Save');
                    $('#btnSave').attr('disabled', false);
                }
            });
        }
        function update() {
            var id      = $('#id').val();
            var nip      = $('#nip').val();
            var username    = $('#username').val();
            var password    = $('#password').val();
            var new_password    = $('#new_password').val();
            var super_user    = $('#super_user').val();
            var organization    = $('#organization').val();
            var grup    = $('#grup').val();
            var name    = $('#name').val();
            var position    = $('#position').val();
            var email    = $('#email').val();
            var contact    = $('#contact').val();
            var information    = $('#information').val();
            $('#btnSave').text('Saving...');
            $('#btnSave').attr('disabled', true);

            var message = 'Data Added Successfully';
            if(method == 'update') {
                message = 'Data Updated Successfully';
            }
            var url = "{{ route('users.update',":id") }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'PUT',
                dataType: 'JSON',
                data: {
                    id: id,
                    username: username,
                    password: password,
                    email: email,
                    super_user: super_user,
                    grup: grup,
                    position: position,
                    real_name: real_name,
                    contact: contact,
                    information: information,
                },
                success: function (data) {
                    $('#modal-form').modal('hide');
                    iziToast.success({
                        title: 'Success',
                        position: 'center',
                        message: message,
                    });
                    table.draw();
                    $('#btnSave').text('Update');
                    $('#btnSave').attr('disabled', false);
                },
                error: function (data) {
                    var error_message="";
                    error_message +="<ul>";
                    $.each( data.responseJSON.errors, function( key, value ) {
                        error_message +="<li>"+value+"</li>";
                    });
                    error_message +="</ul>";
                    iziToast.error({
                        title: 'ERROR !',
                        message: error_message,
                        position: 'topRight'
                    });

                    $('#btnSave').text('Save');
                    $('#btnSave').attr('disabled', false);
                }
            });
        }
    </script>
@endpush