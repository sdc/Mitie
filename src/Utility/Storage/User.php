<?php

namespace App\Utility\Storage;

class User {

    private $username;
    private $name;
    private $admin = false;

    public function setUsername($value)
    {
        $this->isStringOrThrow($value);
        $this->username = $value;
    }
    
    public function setName($value)
    {
        $this->isStringOrThrow($value);
        $this->name = $value;
    }

    public function setAdmin($value)
    {
        if (!is_bool($value)) {
            throw new \Exception('Incorrect data type used in Admin User Setter');
        }
        $this->admin = $value;
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    private function isStringOrThrow($value)
    {
        if (!is_string($value)) {
            throw new \Exception('Incorrect data type used in User setter');
        }
    }
}
