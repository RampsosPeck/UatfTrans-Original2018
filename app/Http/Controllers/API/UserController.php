<?php

namespace Uatftrans\Http\Controllers\API;

use Illuminate\Http\Request;
use Uatftrans\Http\Controllers\Controller;
use Uatftrans\Http\Requests\UserSaveRequest;
use Uatftrans\User;
use Uatftrans\Cuenta;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaveRequest $request)
    {
        //return ['message' => 'Tengo tus datos come come'];
        //return $request;
        $response = $request['cedula'].$request['ru'];

        $id = DB::table('users')->insertGetId([
            'entity' => $request['entity'],
            'name' => $request['name'],
            'cedula' => $request['cedula'],
            'phone' => $request['phone'],
            'ru' => $request['ru'],
            'email' => $request['email'],
            'password' => bcrypt($response),
            'type' => $request['type'], 
            'active' => $request['active'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $qrCode=bcrypt($id.'-'.$request->ru.str_random(40));

        Cuenta::create([
                'QRcode'        => $qrCode,
                'saldo'         => $request['saldo'],
                'user_id'   => $id
            ]);
 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSaveRequest $request, $id)
    {
       
        $user = User::findOrFail($id);
        //Validation
        $user->update($request->all());

         return ['message' => 'La información del usuario fue actualizada'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Cuenta::where('user_id',$id)->delete();

        return ['message' => 'Usuario eliminado'];
    }
}
