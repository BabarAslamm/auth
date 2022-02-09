<?php
namespace Insyghts\Authentication\Services;
use Insyghts\Authentication\Models\User;

class UserService{
    function __construct(User $user) {

        $this->user = $user;
    }

    public function login(array $input)
    {
      $response = [
        'success' => 0,
        'data' => 'Invalid username or password',
      ];

      $Contact = new User();
      $this->user->login($input, $response);

      return $response;
    }





}
