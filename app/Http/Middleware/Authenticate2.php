<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use App\Models\Employee;

class Authenticate2
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
        $this->authenticate($request);

        return $next($request);
    }

    /**
     * Verifica se o token recebido é valido.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request)
    {
        $authorization = $request->header('Authorization');
        
        if(str_starts_with($authorization, "Bearer ")){
            $token = substr($authorization, 7);
            if(Employee::where('remember_token', $token)->first()){
                return;
            }
        }

        $this->unauthenticated($request);
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request)
    {
        throw new AuthenticationException(
            'Unauthenticated.', [], route("unauthorized")
        );
    }
}
