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
    public function postRegistration(Request $request)
    {
        $request->validate([
            'Nom' => ['required', 'string', 'max:255'],
            'Prenom' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'NumeroTelephone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:6'],
            'adresse' => ['required', 'string', 'max:255'],
        ]);
        $user = User::create([
            'Nom' => $request->Nom,
            'Prenom' => $request->Prenom,
            'username' => $request->username,
            'email' => $request->email,
            'NumeroTelephone' => $request->NumeroTelephone,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'adresse' => $request->adresse,
        ]);
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Registration successful.');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended(route('admin.dashboard'))->withSuccess('You have Successfully logged in');
                case 'client':
                    return redirect()->intended(route('client.dashboard'))->withSuccess('You have Successfully logged in');
                case 'mecanicien':
                    return redirect()->intended(route('mec.dashboard'))->withSuccess('You have Successfully logged in');
                default:
                    return redirect('login')->withErrors('Role not recognized.');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
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
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->withSuccess('You have successfully logged out.');
    }
}
