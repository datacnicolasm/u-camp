<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display form login user
     */
    public function loginUser(){
        $message = isset($_GET['message']) ? $_GET['message'] : true;
        return view('user.login', ['message' => $message]);
    }

    /**
     * Form process login
     */
    public function loginUserForm(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Procesar los datos del formulario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // La contraseña es válida
            // Iniciar sesión del usuario, redireccionar, etc.
            $user = User::where('email', $request->input('email'))->first();
            return redirect()->route('login-dashboard', ['user' => $user->id]);
        } else {
            // Las credenciales son inválidas
            // Mostrar un mensaje de error o redireccionar de nuevo al formulario de inicio de sesión
            return redirect()->route('login', ['message' => false]);
        }
    }

    /**
     * Display dashboard
     */
    public function loginDashboard()
    {
        if (isset($_GET['user'])) {
            $id = $_GET['user'];
            $user = User::find($id);
            return view('dashboard.dashboard')->with(['user' => $user]);
        } else {
            return view('dashboard.dashboard');
        }
    }

    /**
     * Display user profile
     */
    public function userProfile()
    {
        if (isset($_GET['user'])) {
            $id = $_GET['user'];
            $user = User::find($id);
            return view('user.profile')->with(['user' => $user]);
        } else {
            return view('user.profile');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
