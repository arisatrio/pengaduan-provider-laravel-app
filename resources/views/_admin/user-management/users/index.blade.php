@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        User
    @endslot

    @slot('breadcrumb')
        <li class="active">User Management</li>
        <li class="active">User</li>
    @endslot

    @slot('content')
        <x-admin.box-component>
            @slot('boxTitle')
                List User
            @endslot

            @slot('boxBody')
                <button class="btn btn-success mt-2" onclick="create()">
                    <i class="fa fa-plus fa-fw"></i> Add User
                </button>
                <x-admin.datatable-component id="table">
                    @slot('columns')
                        <th>NIP</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
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
                <label>Nama</label>
                <input type="text" id="name" class="form-control" placeholder="Enter Real Name ...">
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="text" id="nip" class="form-control" placeholder="Enter NIP ...">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" class="form-control" placeholder="Enter User Name ...">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" class="form-control" placeholder="Enter Password ...">
            </div>
            <div class="form-group" id="form_new_password">
                <label>New Password</label>
                <input type="password" id="new_password" class="form-control" placeholder="Enter New Password ...">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" class="form-control" placeholder="Enter Email ...">
            </div>

            <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" id="contact" class="form-control" placeholder="Enter Contact Number ...">
            </div>
            
            <input type="hidden" name="id" id="id">
        </form>
    </x-slot:modalBody>
</x-admin.modal-form-component>
@endsection

{{-- CRUD --}}
@include('_admin.user-management.users.create')
@include('_admin.user-management.users.edit')

@push('js')
    <script>
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'nip', name: 'nip'},
                {data: 'username', name: 'username'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'action', name: 'action', searchable: false, orderable: false}
            ],
            "columnDefs": [
                {
                    "targets": [6],
                    "className": 'text-center',
                }
            ],
        });
    </script>
    
@endpush

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
                    var url = "{{ route('users.destroy',":id") }}";
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