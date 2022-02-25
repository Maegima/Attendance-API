<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionControler extends Controller
{
    /**
     * Lista permissões.
     *
     * @return mixed
     */
    public function index()
    {
        return Permission::all();
    }
}
