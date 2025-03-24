<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RutaProfesional;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
        // Ruta al archivo JSON
        $jsonPath = database_path('data/features.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $features = json_decode($json, true);
        }

        // Ruta al archivo JSON
        $jsonPath_faqs = database_path('data/faqs.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json_faqs = File::get($jsonPath_faqs);
            $faqs = json_decode($json_faqs, true);
        }

        return view('home.home-precios')->with(
            [
                'features' => $features,
                'faqs' => $faqs
            ]
        );
    }

    public function purchasePage()
    {
        $reference = Str::random(20);

        // Obtener el parámetro 'id' de la URL
        $id_wompi = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id_wompi) {
            // Url de conexión
            $url = 'https://production.wompi.co/v1/transactions/' . $id_wompi;

            try {
                $response = Http::get($url);

                if ($response->successful()) {
                    // Obtener la respuesta de la API
                    $data = $response->json();

                    $transaction = $data['data'] ?? [];
                    $payment = Payment::where('code', $transaction['reference'])->first();

                    if ($transaction["status"] == "APPROVED") {
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
        if ($payment->type_user == "new_user") {
            // Crear el usuario
            $user = new User();
            $user->first_name = strtoupper($payment->first_name);
            $user->last_name = strtoupper($payment->last_name);
            $user->email = strtoupper($payment->email);
            $user->password = bcrypt($payment->password);
            $user->save();

            // Iniciar sesión automáticamente para el usuario creado
            Auth::login($user);
        } else {
            $credentials = array('email' => $payment->email, 'password' => $payment->password);

            if (Auth::attempt($credentials)) {

                $user = User::where('email', $payment->email)->first();

                if ($user) {
                    $user->is_premium = 1;

                    $user->save();
                }
                
            } else {
                Log::info('Error al iniciar sesión');
            }
        }
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
