<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RutaProfesional;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function homePage()
    {
        // Obtener todas las rutas profesionales
        $rutas = RutaProfesional::all();

        return view('home.home-page', compact('rutas'));
    }

    public function cursosPage()
    {
        return view('home.home-cursos');
    }

    public function rutasPage()
    {
        return view('home.home-rutas');
    }

    public function practicasPage()
    {
        return view('home.home-practicas');
    }

    public function preciosPage()
    {
        return view('home.home-precios');
    }

    public function purchasePage()
    {
        $reference = Str::random(20);

        // Obtener el parámetro 'id' de la URL
        $id_wompi = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id_wompi) {
            // Url de conexión
            $url = env('API_WOMPI_TEST') . '/transactions/' . $id_wompi;

            try {
                $response = Http::get($url);

                if ($response->successful()) {
                    // Obtener la respuesta de la API
                    $data = $response->json();
                    $transaction = $data['data'] ?? [];
                    $payment = Payment::where('code', $transaction['reference'])->first();

                    if ( $transaction["status"] == "APPROVED" ) {
                        // Crear usuario
                        $this->createUserPayment($payment);
                    }

                    return view('purchase.purchase-home', compact('reference', 'id_wompi', 'transaction', 'payment'));
                } else {
                    $transaction = ["message" => "Error al obtener los datos de la API"];
                    $payment = null;
                    return view('purchase.purchase-home', compact('reference', 'id_wompi', 'transaction', 'payment'));
                }
            } catch (\Exception $e) {
                $payment = null;
                $transaction = ["message" => "Excepción capturada: " . $e->getMessage()];
                return view('purchase.purchase-home', compact('reference', 'id_wompi', 'transaction', 'payment'));
            }
        } else {
            // Manejar el caso en que no se proporciona 'id' en la URL
            $transaction = ["message" => "ID de transacción no proporcionado"];
            $payment = null;
            return view('purchase.purchase-home', compact('reference', 'id_wompi', 'transaction', 'payment'));
        }
    }

    public function createUserPayment(Payment $payment)
    {
        // Crear el usuario
        $user = new User();
        $user->first_name = strtoupper($payment->first_name);
        $user->last_name = strtoupper($payment->last_name);
        $user->email = strtoupper($payment->email);
        $user->password = bcrypt($payment->password); // Encriptar la contraseña
        $user->save();

        // Iniciar sesión automáticamente para el usuario creado
        Auth::login($user);
    }

    public function terminosPage()
    {
        return view('home.home-terminos');
    }

    public function privacidadPage()
    {
        return view('home.home-privacidad');
    }
}
