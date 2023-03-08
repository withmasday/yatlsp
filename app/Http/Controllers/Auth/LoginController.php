<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid Post Data!');
        }

        try {
            $username = $request->username;
            $password = $request->password;

            $hasUser = User::where('username', '=', $username)->get();
            if (count($hasUser) === 0) {
                return redirect()->back()->with('info', $username . ' Is Not Registered!');
            }

            $signin = Auth::attempt(['username' => $username, 'password' => $password]);
            if ($signin) {
                $role = Auth::user()->role;
                if ($role === 'admin') {
                    return redirect()->route('admin.index')->with('success', 'Sign In Successfully!');
                } else {
                    return redirect()->route('home')->with('success', 'Sign In Successfully!');
                }
            }

            return redirect()->back()->with('error', 'Incorrect Username/Password!s');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', '500 Internal Server Error');
        }
    }
}
