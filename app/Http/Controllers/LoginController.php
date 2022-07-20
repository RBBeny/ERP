<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function home()
    {
        if (auth()->check()) {
            $tipo = auth()->user()->cveTipoUsuario;
            return segunRol($tipo);
        } else {
            return view('Login.login');
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) {
            return redirect()->to('/')->withErrors('Las credenciales son incorrectas');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)

    {
        $tipo = $user['cveTipoUsuario'];
        return segunRol($tipo);
    }

    public function logout()
    {

        auth()->logout();
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        return redirect('/');
    }
}
