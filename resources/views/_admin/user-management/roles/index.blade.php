@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        Roles
    @endslot

    @slot('breadcrumb')
        <li class="active">User Management</li>
        <li class="active">Roles</li>
    @endslot

    @slot('content')
        <x-admin.box-component>
            @slot('boxTitle')
                List Roles
            @endslot

            @slot('boxBody')
                <button class="btn btn-success mt-2" onclick="create()">
                    <i class="fa fa-plus fa-fw"></i> Add Role
                </button>
                <x-admin.datatable-component id="table">
                    @slot('columns')
                        <th>Role Name</th>
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
                <label>Role Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter Role Name ...">
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
                {data: 'action', name: 'action', searchable: false, orderable: false}
            ],
            "columnDefs": [
                {
                    "targets": [2],
                    "className": 'text-center',
                }
            ],
        });
    </script>
@endpush
{{-- CRUD --}}
@include('_admin.user-management.roles.create')
@include('_admin.user-management.roles.edit')

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
                    var url = "{{ route('roles.destroy',":id") }}";
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