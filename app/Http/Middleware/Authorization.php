<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Employee;
use App\Http\Middleware\Authenticate2;

// Esse Midware estende Authenticate2 pra realizar a autenticação e verificar autorização.
class Authorization extends Authenticate2
{
    /**
     * Trata requisição recebida.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $this->authenticate($request);
        $this->authorizate($request, $token);

        return $next($request);
    }

    /**
     * Verifica se o usuário é administrador.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  string $token
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authorizate($request, $token)
    {
        $user = Employee::where('remember_token', $token)->first();
        if($user && $user->type == 2){
            return;
        }

        $this->unauthenticated($request);
    }
}
