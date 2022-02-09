<?php


namespace Insyghts\Authentication\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Insyghts\Authentication\Models\User;
use Insyghts\Authentication\Models\SessionToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Insyghts\Authentication\Helpers\Helpers;
use Insyghts\Authentication\Services\UserService;

class UserController extends Controller
{

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }



public function login(Request $request){
    $input = $request->input();
    $result = $this->userService->login($input);

    if($result['success']){
        return response()->json($result);
    }else{
        return response()->json($result);
    }
}

public function addUser(Request $request)
{
    $input = $request->all();
    if(isset($input['username']) && isset($input['password'])){
        $result = Helpers::addUser($input['username'], $input['password']);
        return response()->json($result);
    }
}



}
