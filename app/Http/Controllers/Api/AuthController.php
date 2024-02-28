<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Captain;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
            'user_type' => [
                'required',
                Rule::in(['user', 'captain']), // Add 'captain' as a valid user type
            ],
        ]);

        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $field => $request->login,
            'password' => $request->password,
        ];

        $guard = $request->input('user_type') === 'captain' ? 'captain' : 'web';

        if (!Auth::guard($guard)->attempt($credentials)) {
            throw ValidationException::withMessages([
                'login' => [trans('auth.failed')],
            ]);
        }

        $user = $guard === 'web'
            ? User::where($field, $request->login)->firstOrFail()
            : Captain::where($field, $request->login)->firstOrFail();

        if (!$user->isVerified) {
            Auth::guard($guard)->logout();
            return response()->json(['error' => 'Unverified account. Please verify your Mobile.'], 403);
        }

        $token = $user->createToken('auth-token');

        return response()->json([
            'token' => $token->plainTextToken,
            'user' => $user,
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }





    public function sms()
    {


        $basic  = new \Vonage\Client\Credentials\Basic("f4622c7d", "i3fq2y0X4iWGGZly");
        $client = new \Vonage\Client($basic);


        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("201002935151", "A7med", 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}