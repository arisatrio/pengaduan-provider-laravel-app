@push('js')
    <script>
        function create() {
            $('#modal-form').modal('show');
            $('#form')[0].reset();
            $('.modal-title').text('Add Permission');
            method = 'store';
        }

        function store() {
            var id      = $('#id').val();
            var name    = $('#name').val();
            $('#btnSave').text('Saving...');
            $('#btnSave').attr('disabled', true);

            var message = 'Data Added Successfully';
            if(method == 'update') {
                message = 'Data Updated Successfully';
            }

            $.ajax({
                url: "{{ route('permission.store') }}",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                    name: name,
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
    </script>
@endpush