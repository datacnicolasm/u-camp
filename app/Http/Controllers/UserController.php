<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display form login user
     */
    public function loginUser()
    {
        return view('user.login');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir a la ruta deseada después de cerrar sesión
        return redirect()->route('login');
    }

    /**
     * Display form create user.
     */
    public function createUser()
    {
        return view('user.create-user');
    }

    /**
     * Form process create user
     */
    public function createUserForm(Request $request)
    {
        // Mensajes de error personalizados
        $messages = [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña es muy corta. Debe tener al menos 6 caracteres.',
        ];

        // Validar los datos del formulario con mensajes personalizados
        $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ], $messages);

        $email = $request->email;

        // Crear el usuario
        $user = new User();
        $user->first_name = strtoupper($request->first_name);
        $user->last_name = strtoupper($request->last_name);
        $user->email = strtoupper($email);
        $user->password = bcrypt($request->password);
        $user->save();

        // Generar evento de registro
        event(new Registered($user));

        // Iniciar sesión automáticamente para el usuario creado
        Auth::login($user);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('login-dashboard');
    }

    /**
     * Form process login
     */
    public function loginUserForm(Request $request)
    {
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
            return redirect()->route('login-dashboard');
        } else {
            // Las credenciales son inválidas
            // Mostrar un mensaje de error o redireccionar de nuevo al formulario de inicio de sesión
            return redirect()->route('login')->with('message', 'Error en el inicio de sesión');
        }
    }

    /**
     * Display dashboard
     */
    public function loginDashboard()
    {
        return view('dashboard.dashboard');
    }

    /**
     * Display user profile
     */
    public function userProfile()
    {
        return view('user.profile');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $email = $request->email;
        $exists = User::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }
    
}
