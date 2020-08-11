<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

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
    public function show()
    {
        return view('auth.login');
    }
    public function authenticated(Request $request, $user)
    {

        if($user->roles->pluck('name')->contains('Manager'))
        {
            return redirect('admin/manager');
        }
        if($user->roles->pluck('name')->contains('Supervisor'))
        {
            return redirect('admin/supervisor');
        }
        if($user->roles->pluck('name')->contains('Staff'))
        {
            return redirect('admin/staff');
        }
        if($user->roles->pluck('name')->contains('Normaluser'))
        {
            return redirect('/normaluser');
        }
        if($user->roles->pluck('name')->contains(''))
        {
            return redirect('/normaluser');
        }

    }
}
