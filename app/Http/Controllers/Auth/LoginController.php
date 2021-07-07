<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Users;
use DB;
use Session;

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

    public function show_login_form()
    {
        return view('login');
    }
    public function process_login(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'required'
        // ]);

        // $credentials = $request->except(['_token']);

        // $user = UserModel::where('user_username',$request->username)->first();
        // Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]);

        $remember_me = $request->has('rememberme') ? true : false;

        if (Auth::attempt(['id'=>$request['id'],'password'=>$request['password']], $remember_me)) {
            $user = Auth::user();
            Session::put('id', $user->id);
            return redirect()->route('home');

        }else{
            session()->flash('message', 'ID and/or password invalid.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
