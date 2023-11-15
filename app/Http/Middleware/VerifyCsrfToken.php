<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Session\TokenMismatchException
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Adiciona o token CSRF apenas se a resposta for uma resposta JSON
        if ($this->isResponseJson($response) && $request->session()) {
            $response->headers->set('X-CSRF-TOKEN', csrf_token());
        }

        return $response;
    }

    /**
     * Determine se a resposta é uma resposta JSON.
     *
     * @param  mixed  $response
     * @return bool
     */
    protected function isResponseJson($response)
    {
        return $response instanceof SymfonyResponse &&
               Str::contains($response->headers->get('Content-Type'), 'application/json');
    }
}
