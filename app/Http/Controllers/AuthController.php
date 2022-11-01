<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ValidateTokenRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(
            $request->only('name', 'email', 'password')
        );
        
        Auth::login($user);

        $user->tokens()->delete();

        $token = $user->createToken('user-token')
                ->plainTextToken;

        return [
            'dados' => auth()->user(),
            'token' => $token
        ];
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->all())) {
            $user = $request->user();

            $user->tokens()->delete();

            $token = $user->createToken('user-token')->plainTextToken;
            return [
                'dados' => auth()->user(),
                'token' => $token
            ];
        }
        return [];  
    }

    public function logout()
    {
        Auth::logout();
    }

    private function geraToken()
    {
        return bin2hex(random_bytes(110));
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $usuario = User::select('id','email')
            ->where('email', $request->email)
            ->first();

        if (!$usuario) return null;

        $dados = [
            'email' => $usuario->email,
            'user_id' => $usuario->id,
            'token' => $this->geraToken(),
            'created_at' => date('Y-m-d H:m:s')
        ];

        PasswordReset::create($dados);
        // Implementar envio de email
        // com o link da pagina reset e token gerado
    }

    public function validateToken(ValidateTokenRequest $request)
    {
        $existe = PasswordReset::where('token', $request->token)
            ->where('user_id', $request->id)
            ->count();

        return $existe > 0;
    }

    public function reset(ResetPasswordRequest $request)
    {
        $reset = PasswordReset::select('email')
            ->where('user_id', $request->id)
            ->where('token', $request->token)
            ->first();
        
        if (!$reset) return null;

        $usuario = User::select('id', 'password')
            ->where('email', $reset->email)
            ->first();

        if (!$usuario) return null;

        return $usuario->update([
            'password' => $request->password
        ]);
    }
}