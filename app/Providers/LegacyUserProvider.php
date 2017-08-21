<?php

namespace App\Providers;

use App\LegacyUser;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Supports\DatabaseManager;


class LegacyUserProvider implements UserProvider {


    public function __construct($db) {
        
        $this->db = $db;

    }

    public function retrieveById($identifier)
    {
        // should query the database and return a Authenticatable instance

        // select * from legacy_users where id = $identifier limit 1;
        
        $row = $this->db->table('legacy_users')->where('id', $identifier)
            ->limit(1)
            ->first();

        if($row === null) 
        {
            return null;
        }

        $user = new LegacyUser;
        
        $user->id = $row->id;
        $user->name = $row->name;
        $user->password = $row->password;
        $user->email = $row->email;

        return $user;

    }

    public function retrieveByToken($identifier, $token)
    {
            // select * from legacy_users where token = $identifier limit 1;

            return null;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // update legacy_users set token = $token where id = $user->id;
    }

    public function retrieveByCredentials(array $credentials)
    {
        
        $row = $this->db->table('legacy_users')->where('email', $credentials['email'])->limit(1)->first();

        if($row === null) 
        {
            return null;
        }

        $user = new LegacyUser;
        
        $user->id = $row->id;
        $user->name = $row->name;
        $user->password = $row->password;
        $user->email = $row->email;

        return $user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return $user->password === $credentials['password'];
    }


}

