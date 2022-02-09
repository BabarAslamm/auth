<?php
namespace Insyghts\Authentication\Services;
use Insyghts\Authentication\Models\User;

class UserService{
    function __construct(User $user) {

        $this->user = $user;
    }

    public function login(array $input)
    {

      $Contact = new User();
      return  $result = $this->user->login($input);

    }





}
