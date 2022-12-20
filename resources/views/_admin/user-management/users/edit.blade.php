@push('js')
    <script>
        function edit(id) {
            console.log('cek');
            $('#modal-edit').modal('show');

            $('#form')[0].reset();
            $('.modal-title').text('Edit User');
            $('#form_new_password').attr('hidden',false);
            method = 'update';

            var url = "{{ route('users.edit',":id") }}";
            url = url.replace(':id', id);
            
            $.get(url, function (data) {
                $('#nip').val(data.data.nip);
                $('#username').val(data.data.username);
                $('#email').val(data.data.email);
                $('#name').val(data.data.name);
                $('#contact').val(data.data.contact);
                $('#information').val(data.data.information);
                $('#modal-form').modal('show');
            });
        }
    </script>
@endpush