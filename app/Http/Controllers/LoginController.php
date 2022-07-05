<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    //
    public function home()
    {
        return view('Login.login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('auth.failed');
        }

        // Auth::attempt($credentials);
        // // $request->session()->regenerate();
        // Auth::login($credentials);
        // return $this->authenticated($request, $credentials);

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        //Auth::login($user);
        // $remember = false;
        // Auth::attempt($credentials, $remember);
        // info($user);

        
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)

    {
        session_start();
        $tipo = $user['cveTipoUsuario'];
        $_SESSION['tipo']=$tipo;
        


        // $rol = DB::table('tusuario')
        // ->select('cveTipoUsuario')
        // ->where()
        // ->get();

        //return response(json_encode($tipo),200)->header('Content-type','text-plain');
        
        
        switch ($tipo) {
            case 1:
                echo "i es igual a 1";
                break;
            case 3:
                return redirect('/homeAdmin');
                break;
            case 4:
                return redirect('/homeVentas');
                break;
            case 5:
                return redirect('/homeCobranza');
                break;
            case 6:
                echo "i es igual a 2";
                break;
            case 7:
                
                return redirect('/homeGCobranza');
                break;
            case 8:
                echo "i es igual a 1";
                break;
            case 9:
                echo "i es igual a 1";
                break;
        }
        
    }


    public function logout()
    {
        if (session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
        }
       
        return redirect('/login');
    }
}
