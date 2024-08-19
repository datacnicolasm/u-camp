<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'type_user' => 'required|string|max:255',
        ]);

        $payment = Payment::create([
            'code' => $request->code,
            'email' => $request->email,
            'password' => $request->password ?? null,
            'first_name' => $request->first_name ?? null,
            'last_name' => $request->last_name ?? null,
            'type_user' => $request->type_user,
        ]);

        Log::info('Pago creado: ' . $payment);

        return response()->json(['success' => true, 'payment' => $payment]);
    }
}
