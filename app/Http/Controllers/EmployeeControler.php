<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeControler extends Controller
{
    /**
     * Retorna informações sobre um funcionário pelo id.
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id)
    {
        return Employee::find($id);
    }

    /**
     * Adiciona uma funcionário ao banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $all = $request->all();
        $all["password"] = Hash("sha256", str($request->password), false);
        return Employee::create($all);
    }
}
