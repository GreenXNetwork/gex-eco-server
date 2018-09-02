<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginHelper;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Login Proxy
     */
    private $loginProxy;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginProxy $loginProxy)
    {
        $this->middleware('guest')->except('logout');
        $this->loginProxy = $loginProxy;
    }

    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $tokenData = LoginHelper::login($this->loginProxy, $email, $password);

        $user = User::where('email', $email)->first();
        $role = $user->roles()->get()->pluck('name')->toArray();

        return LoginHelper::buildResponse($tokenData, $role);
    }

    public function refresh(Request $request)
    {
        return response()->json($this->loginProxy->attemptRefresh());
    }

    public function logout()
    {
        $this->loginProxy->logout();

        return response()->json(null, 204);
    }

}
