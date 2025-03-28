<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->country = $request->input('country');
        $user->city = $request->input('city');

        if ($request->hasFile('profile_image')) {
            
            // Delete the old image if it exists
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
    
            // Store the new image
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->save();

        return redirect()->route('user-cuenta');
    }

    /**
     * Display form login user
     */
    public function loginUser()
    {
        return view('user.login');
    }

    public function getUserCuenta()
    {
        return view('user.ajustes-user')->with('user', Auth::user());
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
    public function createUserForm(CreateUserRequest $request)
    {
        // Validar los datos del formulario, incluyendo la confirmación de la contraseña
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // Crear el usuario
            $user = User::create([
                'first_name' => strtoupper($request->first_name),
                'last_name' => strtoupper($request->last_name),
                'email' => strtoupper($request->email),
                'password' => Hash::make($request->password),
            ]);

            // Generar evento de registro
            event(new Registered($user));

            // Iniciar sesión automáticamente para el usuario creado
            Auth::login($user);

            // Redireccionar con un mensaje de éxito
            return redirect()->route('login-dashboard');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // Manejar cualquier error que ocurra durante la creación del usuario
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al crear el usuario. Por favor, inténtelo de nuevo.']);
        }
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
