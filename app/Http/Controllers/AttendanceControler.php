<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceControler extends Controller
{
    /**
     * Lista a presença dos funcionários os parâmetros "begin" e "end" são
     * utilizados para filtrar o resultado entre duas datas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $begin = $request->query("begin", "0001-01-01");
        $end = $request->query("end", "9999-12-31");

        return Attendance::where([
            ["created_at", ">", $begin],
            ["created_at", "<", $end]
        ])->get();
    }
 
    /**
     * Retorna uma presença deacordo com o seu id.
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id)
    {
        return Attendance::find($id);
    }

    /**
     * Adiciona uma presença ao utilizando id ou cpf do funcionário recebido na requisição.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $all = $request->all();
        if(array_key_exists("cpf", $all)){
            $user = Employee::where("cpf", $all["cpf"])->firstOrFail();
            $all["user_id"] = $user->id;
        }
        return Attendance::create($all);
    }

    /**
     * Atualiza uma presença utilizando o id da presença.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $article = Attendance::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    /**
     * Remove uma presença pelo seu id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return mixed
     */
    public function delete(Request $request, $id)
    {
        $article = Attendance::findOrFail($id);
        $article->delete();

        return 204;
    }
}
