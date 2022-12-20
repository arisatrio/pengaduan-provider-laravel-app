@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        Kategori
    @endslot

    @slot('breadcrumb')
        <li class="active">Master Data</li>
        <li class="active">Kategori</li>
    @endslot

    @slot('content')
        <x-admin.box-component>
            @slot('boxTitle')
                List Kategori
            @endslot

            @slot('boxBody')
                <button class="btn btn-success mt-2" onclick="create()">
                    <i class="fa fa-plus fa-fw"></i> Kategori
                </button>
                <x-admin.datatable-component id="table">
                    @slot('columns')
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                    @endslot
                </x-admin.datatable-component>
            @endslot
        </x-admin.box-component>
    @endslot
</x-admin.layout-component>

<x-admin.modal-form-component>
    <x-slot:modalBody>
        <form id="form">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" id="name" class="form-control" placeholder="Masukkan nama kategori ...">
            </div>
            <div class="form-group">
                <label>Deskripsi Kategori</label>
                <input type="text" id="description" class="form-control" placeholder="Masukkan deskripsi kategori ...">
            </div>
            <input type="hidden" name="id" id="id">
        </form>
    </x-slot:modalBody>
</x-admin.modal-form-component>
@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action', searchable: false, orderable: false}
            ],
            "columnDefs": [
                {
                    "targets": [3],
                    "className": 'text-center',
                }
            ],
        });
    </script>
@endpush
{{-- CRUD --}}
@include('_admin.master-data.category.create')
@include('_admin.master-data.category.edit')

@push('js')
    <script>
        function destroy(id) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var url = "{{ route('category.destroy',":id") }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            "id": id
                        },
                        dataType: "JSON",
                        success: function (data) {
                            if(data.status) {
                                iziToast.success({
                                    title: 'Success',
                                    position: 'center',
                                    message: data.message,
                                });
                                table.draw();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            alert('Error deleting data');
                        }
                    });
                }
            });
        }
    </script>
@endpush