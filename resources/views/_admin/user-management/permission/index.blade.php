@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        Permissions
    @endslot

    @slot('breadcrumb')
        <li class="active">User Management</li>
        <li class="active">Permissions</li>
    @endslot

    @slot('content')
        <x-admin.box-component>
            @slot('boxTitle')
                List Permissions
            @endslot

            @slot('boxBody')
                <button class="btn btn-success mt-2" onclick="create()">
                    <i class="fa fa-plus fa-fw"></i> Add Permission
                </button>
                <x-admin.datatable-component id="table">
                    @slot('columns')
                        <th>Permission Name</th>
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
                <label>Permission Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter Permission Name ...">
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
@include('_admin.user-management.permission.create')