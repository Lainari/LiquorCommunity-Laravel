<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    // 회원가입
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:users',
            'nickname' => 'required|unique:users',
            'password' => 'required',
            'birthday' => 'required|date',
        ]);

        $user = new User;
        $user->user_id = $request->user_id;
        $user->nickname = $request->nickname;
        $user->password = Hash::make($request->password);
        $user->birthday = $request->birthday;
        $user->isAdmin = false;
        $user->save();

        return redirect('/mypage/signin')->with('success', '회원가입이 완료되었습니다.');
    }

    // 아이디 & 닉네임 중복 체크
    public function check(Request $request)
    {
        $type = $request->input('type');
        $value = $request->input('value');

        // 타입에 따라 id 또는 nickname을 확인합니다.
        $column = $type === 'user_id' ? 'user_id' : 'nickname';

        // users 테이블에서 해당 값이 있는지 확인합니다.
        $exists = User::where($column, $value)->exists();
        
        return response()->json(['exists' => $exists]);
    }

    // 회원정보 수정
    public function update(Request $request)
    {
        $user = $request->attributes->get('user');
    
        $user->nickname = $request->input('nickname');
        $user->birthday = $request->input('birthday');
    
        if ($user->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // 회원탈퇴 로직
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete(); 
            return response()->json(['message' => '회원탈퇴가 완료되었습니다.'], 200);
        } else {
            return response()->json(['message' => '회원 정보를 찾을 수 없습니다.'], 404);
        }
    }


    // 로그인 로직
    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('user_id', $request->id)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // 토큰 생성하여 세션에 저장
            $token = JWTAuth::fromUser($user);
            return redirect('/')->withCookie('token', $token, 60);
        } else {
            return redirect('/mypage/signin')->with('message', '잘못된 아이디 또는 비밀번호 입니다');
        }
    }

    // 로그아웃 로직
    public function logout(Request $request)
    {
        $response = response()->json(['message' => '로그아웃 성공']);
        return $response->withoutCookie('token');
    }
}
