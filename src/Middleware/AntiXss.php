<?php

namespace bobrovva\anti_xss_lib\Middleware;

use Closure;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AntiXss
{
    /**
     * Обрабатывает входящий HTTP-запрос и удаляет все XSS-атаки.
     *
     * @param \Illuminate\Http\Request $request  Входящий запрос.
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next  Следующее действие в цепочке обработки.
     *
     * @return \Symfony\Component\HttpFoundation\Response Ответ на запрос после обработки.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $input = Binput::all();
        $request->merge($input);
        return $next($request);
    }
}