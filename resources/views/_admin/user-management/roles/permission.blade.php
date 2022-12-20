@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        Permission Setting
    @endslot

    @slot('breadcrumb')
        <li class="active">User Management</li>
        <li class="active"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="active">Permission Setting</li>
    @endslot

    @slot('content')
        <x-admin.box-component>
            @slot('boxTitle')
                List Permission
            @endslot

            @slot('boxBody')
                
            @endslot
        </x-admin.box-component>
    @endslot
</x-admin.layout-component>

@endsection