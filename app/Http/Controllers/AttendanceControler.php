<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceControler extends Controller
{
    public function index()
    {
        return Attendance::all();
    }
 
    public function show($id)
    {
        return Attendance::find($id);
    }

    public function store(Request $request)
    {
        return Attendance::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Attendance::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Attendance::findOrFail($id);
        $article->delete();

        return 204;
    }
}
