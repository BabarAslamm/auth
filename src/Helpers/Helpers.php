<?php

namespace Insyghts\Authentication\Helpers;

use Illuminate\Support\Facades\Hash;
use Insyghts\Authentication\Models\User;
use Insyghts\Authentication\Services\UserService;

class Helpers
{
    public static function addUser($username, $password)
    {

        if($username != '' && $password != ''){
            $password = Hash::make($password);
        }

        $user = new User();
        $user->username = $username;
        $user->password = $password;

        if($user->save()){
            return ['success' => true, 'message' => 'User created successfully!'];
        }
        return ['success' => false, 'message' => 'There is some error!'];
    }
}