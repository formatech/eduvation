<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;

class LegacyUser implements Authenticatable 
{
    public $id;
    public $name;
    public $email;
    public $password;

    public function getAuthIdentifierName() 
    {
        return 'id';
    }

    public function getAuthIdentifier() 
    {
        return $this->id;
    }

    public function getAuthPassword() 
    {
        return $this->password;
    }

    public function getRememberToken() 
    {
        return null;
    }

    public function setRememberToken($value) 
    {
        return null;
    }

    public function getRememberTokenName() 
    {
        return '';
    }

}