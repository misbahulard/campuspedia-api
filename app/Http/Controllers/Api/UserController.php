<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    
    /**
    * Show user per id
    * @return Response JSON
    */
    public function show($id)
    {
        if(User::find($id)) {
            return new UserResource(User::find($id));
        } else {
            return response()->json([
                'status_code' => 0,
                'message' => 'User or password not valid'
            ]);
        }
    }

    /**
     * Handle an authentication attempt.
     * @return Response JSON
     */
    public function login(Request $request)
    {
        $credentials =  [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2
        ];

        if (Auth::attempt($credentials)) 
        {
            return new UserResource(User::where('email', $credentials['email'])->first());
        } else {
            return response()->json([
                'status_code' => 0,
                'message' => 'User or password not valid'
            ]);
        }
    }
}
