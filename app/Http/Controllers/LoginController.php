<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function inscription()
    {
        return view('auth.inscription');
    }
    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function postRegistration(Request $request)
    {
        $request->validate([
            'Nom' => ['required', 'string', 'max:255'],
            'Prenom' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'NumeroTelephone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'in:client,mecanicien'],
        ]);

        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('layouts\dashbord');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    public function create(array $data)
    {
      return User::create([
            'Nom' => $data['Nom'],
            'Prenom' => $data['Prenom'],
            'username' => $data['username'],
            'email' => $data['email'],
            'NumeroTelephone' => $data['NumeroTelephone'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
