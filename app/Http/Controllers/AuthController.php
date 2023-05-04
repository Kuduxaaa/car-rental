<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('admin.auth.login');
    }


    /**
     * Handle account login request
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(!Auth::validate($credentials)):
            return redirect()->to(route('login'))->withErrors(trans('auth.failed'));

        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

    
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('admin'));
    }
}
