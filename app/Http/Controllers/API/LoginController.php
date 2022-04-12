<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken(env('APP_NAME'))->accessToken;
            return response()->json(['success' => $success, 'user_id' => $user->id], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $employee = Employee::create($input);
        $success['token'] =  $employee->createToken('MyApp')->accessToken;
        $success['name'] =  $employee->name;
        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function getRegisteredUser()
    {
        $employee = Auth::user();
        return response()->json(['success' => $employee], $this->successStatus);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ["message" => "Vous êtes désormais déconnecté."];
        return response($response, 200);
    }
}
