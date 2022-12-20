<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        return view('_admin.user-management.roles.permission');
    }
}
