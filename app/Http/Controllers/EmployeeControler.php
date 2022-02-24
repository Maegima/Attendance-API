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
        return Employee::create($request->all());
    }
}
