<?php

namespace App\Services;

use App\Models\User;

class UserCreator
{
    public function AddUser(string $nick,
                            string $password,
                            string $email,
                            int    $role = 1,
                            string $avatar = 'uploads/service_photo/default-avatar.png') : User
    {
        $user = new User();
        $user->name = $nick;
        $user->password = $password;
        $user->email = $email;
        $user->role = $role;
        $user->avatar = $avatar;
        return $user;
    }
}
