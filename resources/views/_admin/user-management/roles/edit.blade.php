@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('.modal-title').text('Edit Role');
            method = 'update';

            var url = "{{ route('roles.edit',":id") }}";
            url = url.replace(':id', id);
            
            $.get(url, function (data) {
                $('#name').val(data.data.name);
                $('#id').val(data.data.id);
                $('#modal-form').modal('show');
            });
        }
    </script>
@endpush