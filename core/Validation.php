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
            if ($data == 'profile_picture') continue; // Ignores image input field (can be NULL)
            if (!$data) return false;
        }
        return true;
    }

    public function matchPassword($password1, $password2)
    {
        if ($password1 != $password2) return false;

        return true;
    }

    public function validateFirstName($firstname)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $firstname)) return false;

        return true;
    }

    public function validateLastName($lastname)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $lastname)) return false;

        return true;
    }

    public function validateUsername($username)
    {
        if (!preg_match('/^[a-zA-Z0-9]{5,20}$/', $username)) return false;// for english chars + numbers only
    // valid username, alphanumeric & longer than or equals 5 chars
        return true;
    }

    public function checkIfEmailExists($input)
    {
        $emails = App::get('database')->selectEmails();

        foreach ($emails as $email) {
            if ($email === $input) return false;
        }

        return true;
    }

    public function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;

        return true;
    }

    public function validatePassword($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) return false;

        return true;
    }
}