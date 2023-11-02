<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->cookie('token')) {
            try {
                $user = JWTAuth::setToken($request->cookie('token'))->authenticate();
            } catch (Exception $e) {
                // 토큰이 유효하지 않으면 로그아웃 상태로 간주합니다.
                return redirect('/mypage/signin')->with('message', '세션이 만료되었습니다. 다시 로그인해주세요.');
            }
        } else {
            return redirect('/mypage/signin')->with('message', '로그인이 필요합니다.');
        }
    
        // $user 의 정보를 넘기는 단계
        $request->attributes->add(['user' => $user]);
    
        return $next($request);
    }

}
