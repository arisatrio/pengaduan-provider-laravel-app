@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        Profile
    @endslot

    @slot('breadcrumb')
        <li class="active">Profile</li>
    @endslot

    @slot('content')
        <x-admin.box-component>
            @slot('boxTitle')
                Edit Profile
            @endslot

            @slot('boxBody')
            <form id="form" action="{{route('profile.update', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{auth()->user()->nip}}">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{auth()->user()->username}}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Old Password ...">
            </div>
            <div class="form-group" id="form_new_password">
                <label>Konfirmasi Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="Enter New Password ...">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
            </div>

            <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" name="contact" class="form-control" value="{{auth()->user()->contact}}">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
            @endslot
        </x-admin.box-component>
    @endslot
</x-admin.layout-component>

@endsection
{{-- CRUD --}}
@include('_admin.user-management.users.create')
@include('_admin.user-management.users.edit')
