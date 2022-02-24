<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionControler extends Controller
{
    public function index()
    {
        return Permission::all();
    }
}
