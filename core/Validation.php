<?php

namespace App\Core;

class Validation
{
    public function trimPost($value)
    {
        foreach ($value as $key => $data) {
            $_POST[$key] = trim($data);
        }
    }

    public function checkIfEmpty($input)
    {
        foreach ($input as $data) {
            if (!$data) return false;
        }
        return true;
    }

    public function matchPassword($password1, $password2)
    {
        if ($password1 != $password2) return false;

        return true;
    }

    public function validateEmail($input)
    {
        $emails = App::get('database')->selectEmails();

        foreach ($emails as $email) {
            if($email == $input) return false;
        }

        return true;
    }

    public function validatePassword($password)
    {
        if (strlen($password) < 8) return false;

        return true;
    }
}