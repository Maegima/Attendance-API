<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeControler extends Controller
{
    public function show($id)
    {
        return Employee::find($id);
    }

    public function store(Request $request)
    {
        $all = $request->all();
        $all["password"] = Hash("sha256", str($request->password), false);
        return Employee::create($all);
    }
}
