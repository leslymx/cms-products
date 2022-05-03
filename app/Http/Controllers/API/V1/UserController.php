<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $user->avatar;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request) {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                // 'avatar' => $request->avatar,
                'password' => bcrypt($request->password),
            ]);
            $user->save();

            return response()->json([
                'statusCode' => 201,
                'dev' => 'El usuario se creo exitosamente',
                'message' => 'Usuario creado exitosamente',
                'token' => $request->user()->createToken($request->email)->plainTextToken,
                'user information' => $user
            ], 201);
        }

        return response()->json([
            'statusCode' => ob_get_status(true),
            'dev' => 'No se creo el usuario',
            'message' => 'No se pudo crear el usuario. Intentalo de nuevo.',
            'token' => '',
            'user information' => '{}'
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
