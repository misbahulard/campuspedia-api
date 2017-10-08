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
                'data' => [
                    'message' => 'User not found'
                ],
                'meta' => [
                    'status_code' => 0,
                ]
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
                'data' => [
                    'message' => 'User or password not valid',
                ],
                'meta' => [
                    'status_code' => 0,
                ]
            ]);
        }
    }
    /**
     * Handle user registration
     *
     * User post the credential
     *
     * @param Type $var Description
     * @return Response JSON
     **/
    public function register(Request $request)
    {
        if (!User::where('email', '=', $request->email)->exists()) {
            $user = new User;
            $user->role_id = 2;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->photo = 'default.jpg';
            $user->api_token = str_random(60);    
            if ($user->save()) {
                return response()->json([
                    'data' => [
                        'message' => 'Registration success'
                    ],
                    'meta' => [
                        'status_code' => 1,
                    ]
                ]);
            } else {
                return response()->json([
                    'data' => [
                        'message' => 'Registration failed'
                    ],
                    'meta' => [
                        'status_code' => 0,
                    ]
                ]);
            }
        } else {
            return response()->json([
                'data' => [
                    'message' => 'This email has been registered'
                ],
                'meta' => [
                    'status_code' => 0,
                ]
            ]);
        }
    }
}
