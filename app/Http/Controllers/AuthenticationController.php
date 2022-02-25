<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Employee;

class AuthenticationController extends Controller
{
    /**
     * Realização de login e geração de token ao receber
     * username e password via requisição.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = Hash("sha256", str($request->password), false);
        $user = Employee::where(["email" => $username, "password" => $password])->first();
        if($user){
            $user->remember_token = Str::Random(100);
            $user->save();
            return ['token' => $user->remember_token];
        }
        return route("unauthorized");
    }

    /**
     * Realização de logout removendo o token do banco de dados.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        $authorization = $request->header('Authorization');

        if(str_starts_with($authorization, "Bearer ")){
            $token = substr($authorization, 7);
            $user = Employee::where('remember_token', $token)->first();
            if($user){
                $user->remember_token(null);
                $user->save();
            }
        }
        return response('', 200);
    }
}
