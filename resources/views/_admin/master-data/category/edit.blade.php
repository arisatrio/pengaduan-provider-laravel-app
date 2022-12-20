@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('.modal-title').text('Edit Kategori');
            method = 'update';

            var url = "{{ route('category.edit',":id") }}";
            url = url.replace(':id', id);
            
            $.get(url, function (data) {
                $('#name').val(data.data.name);
                $('#description').val(data.data.description);
                $('#id').val(data.data.id);
                $('#modal-form').modal('show');
            });
        }
    </script>
@endpush