<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
     public function register(Request $request)
    {
        $request->validate([
            'custom_id'      => 'nullable|string',
            'name'             => 'required|string|max:255',
            'surname'          => 'required|string|max:255',
            'email'          => 'required|string|email|unique:users',
            'password'       => 'required|string|min:6',
            'wallet'         => 'nullable|string',
            'adress'          => 'nullable|string',
            'birthdate'         => 'nullable|string',
        ]);

        $user = User::create([
            'custom_id'      => $request->custom_id,
            'name'             => $request->name,
            'surname'          => $request->surname,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'adress'          => $request->adress,
            'wallet'          => $request->wallet,
            'birthdate'         => $request->birthdate,
        ]);

        return response()->json([
            'message' => 'Kayıt başarılı!',
            'user'    => $user
        ], 201);
    }
}
