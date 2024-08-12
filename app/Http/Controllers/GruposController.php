<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupInvitationLink;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class GruposController extends Controller
{
    public function dashboardGrupos()
    {
        return view('grupos.dashboard');
    }

    public function listGroups()
    {
        return view('grupos.list-groups');
    }

    public function getGroup(Request $request)
    {
        $group = Group::find($request->id);

        return response()->json(['data' => $group]);
    }

    public function deleteGroup(Request $request)
    {
        // Validar el ID del grupo
        $request->validate([
            'id' => 'required|exists:groups,id'
        ]);

        // Buscar y eliminar el grupo
        $group = Group::find($request->id);

        if ($group) {
            $group->delete();
            return response()->json(['message' => 'Grupo eliminado correctamente.'], 200);
        }

        return response()->json(['message' => 'Grupo no encontrado.'], 404);
    }

    public function editGroup(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id' => 'required|exists:groups,id',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Suponiendo que el color es un código hexadecimal
        ]);

        // Buscar el grupo por ID
        $group = Group::find($validatedData['id']);

        // Verificar si el grupo fue encontrado
        if (!$group) {
            return response()->json(['error' => 'Grupo no encontrado.'], 404);
        }

        // Actualizar el grupo con los datos validados
        $group->name = $validatedData['name'];
        $group->color = $validatedData['color'];
        $group->save();

        // Devolver una respuesta JSON con el grupo actualizado
        return response()->json(['data' => $group], 200);
    }

    public function createGroup(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Suponiendo que el color es un código hexadecimal
        ]);

        // Crear grupo
        $group = Group::create([
            'name' =>       $validatedData['name'],
            'color' =>      $validatedData['color'],
            'user_id' =>    $request->user()->id,
        ]);

        // Devolver una respuesta JSON con el grupo actualizado
        return response()->json(['data' => $group], 200);
    }

    public function listMembers()
    {
        return view('grupos.list-members');
    }

    public function createLinkGroup(Request $request)
    {
        $group = Group::find($request->group_id);

        if (!$group) {
            return response()->json(['error' => 'Grupo no encontrado.'], 404);
        }

        $user = $request->user();

        $invitationLink = GroupInvitationLink::generate($user, $group);

        return response()->json([
            'data' => [
                'success' => true,
                'link' => route('join-group', ['key' => $invitationLink->invitation_key])
            ]
        ], 200);
    }

    public function toNewUser(Request $request)
    {
        return view('grupos.link-new-user')->with([
            'user_create' => User::findOrFail($request->user_create),
            'group' => Group::findOrFail($request->group),
            'invitation_key' => $request->invitation_key
        ]);
    }

    public function joinGroup(Request $request, $key)
    {
        // Buscar el enlace de invitación basado en la clave proporcionada
        $invitationLink = GroupInvitationLink::where('invitation_key', $key)->first();

        // Verificar si el enlace es válido o ha expirado
        if (!$invitationLink || !$invitationLink->isValid()) {
            // Enlace no válido o expirado, redirigir a la página de inicio con un mensaje de error
            return view('grupos.link-invalid');
        }

        $invitationLink->load("user");
        $invitationLink->load("group");

        // Verificar si el usuario no ha iniciado sesión
        if (!$request->user()) {
            // Usuario no autenticado, redirigir a la vista de creación de cuenta o inicio de sesión
            return view('grupos.link-new-user')->with([
                'user_create' => $invitationLink->user,
                'group' => $invitationLink->group,
                'invitation_key' => $key
            ]);
        }

        // Usuario autenticado, verificar si ya es miembro del grupo
        if ($request->user()->group->contains($invitationLink->group_id)) {
            // Usuario ya es miembro del grupo, redirigir con un mensaje de error
            return view('grupos.already-member')->with([
                'user_create' => $invitationLink->user,
                'group' => $invitationLink->group
            ]);
        }

        // Usuario autenticado y no es miembro del grupo, unirlo al grupo
        $user = $request->user();
        $user->group()->attach($invitationLink->group_id);

        // Redirigir al espacio de trabajo del grupo con un mensaje de éxito
        return view('grupos.user-attached')->with([
            'user_create' => $invitationLink->user,
            'group' => $invitationLink->group
        ]);
    }

    public function createUserGroup(Request $request)
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

            // Buscar el enlace de invitación basado en la clave proporcionada
            $invitationLink = GroupInvitationLink::where('invitation_key', $request->key)->first();

            // Asignar el grupo al usuario
            if ($invitationLink) {
                $user->group()->attach($invitationLink->group_id);
            }

            // Redireccionar con un mensaje de éxito
            return redirect()->route('login-dashboard');
        } catch (\Exception $e) {
            // Manejar cualquier error que ocurra durante la creación del usuario
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al crear el usuario. Por favor, inténtelo de nuevo.']);
        }
    }

    public function deleteUserGroup(Request $request)
    {
        $id_user = $request->id_user;
        $id_group = $request->id_group;

        // Buscar la instancia de la tabla pivote
        $user = User::findOrFail($id_user);
        $group = Group::findOrFail($id_group);

        // Eliminar la relación en la tabla pivote
        $user->group()->detach($group);

        return response()->json([
            "data" => true
        ]);
    }

    public function attachGroup(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'key' => 'required|string',
        ]);

        // Obtener las credenciales del request
        $credentials = $request->only('email', 'password');

        // Intentar iniciar sesión
        if (Auth::attempt($credentials)) {
            // La autenticación fue exitosa...

            // Regenerar la sesión para protegerla contra fijación de sesión
            $request->session()->regenerate();

            // Buscar el enlace de invitación basado en la clave proporcionada
            $invitationLink = GroupInvitationLink::where('invitation_key', $request->key)->first();

            // Buscar usuario
            $user = User::where('email', $request->email)->first();

            // Usuario autenticado, verificar si ya es miembro del grupo
            if ($user->group->contains($invitationLink->group_id)) {
                // Usuario ya es miembro del grupo, redirigir con un mensaje de error
                return view('grupos.already-member')->with([
                    'user_create' => $invitationLink->user,
                    'group' => $invitationLink->group
                ]);;
            }

            // Asignar el grupo al usuario
            if ($invitationLink) {
                $user->group()->attach($invitationLink->group_id);
                // Redirigir al usuario a su página de destino
                return redirect()->intended('dashboard');
            }
        }

        // Si la autenticación falla, redirigir de vuelta con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function linkIsUser(Request $request)
    {
        return view('grupos.link-valid')->with([
            'user_create' => User::findOrFail($request->user_id),
            'group' => Group::findOrFail($request->group_id),
            'invitation_key' => $request->invitation_key
        ]);;
    }
}
