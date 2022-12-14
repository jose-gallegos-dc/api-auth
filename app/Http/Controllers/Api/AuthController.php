<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
   public function register(RegisterRequest $request){

      // Si pasa la validación
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role_id = $request->role_id;
      $user->save();

      return response()->json([
         'status' => true,
         'message' => 'User successfully registered',
      ], 201);
   }

   public function login(LoginRequest $request){

        // si la validación pasa
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $expires = Carbon::now()->addMonth(); // Un mes
            $expiresInMinutes = $expires->diffInSeconds(Carbon::now()); // Un mes en segundos
            $cookie = cookie('access_token', $token, $expiresInMinutes);
            $user->remember_token = $token;
            $user->update();
            return response()->json([
                'status' => true,
                'token_name' => 'access_token',
                'token_value' => $token,
                'token_expires' => $expiresInMinutes
            ], 200)->withCookie($cookie);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials',
            ], 401);
        }
   }

   public function getToken(Request $request){
   
      $token = User::where('remember_token', $request->input('token'))->value('remember_token');

      if(!$token) return response()->json(['token_exists' => false], 401);
         
      return response()->json(['token_exists' => true], 200);
   }
}
