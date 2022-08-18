<?php

namespace App\Controllers;
use App\Core\App;
use App\Core\Validation;

class AuthController
{
    public function openRegisterForm()
    {
        $errorMsg = null;
        return view('register', compact('errorMsg'));
    }

    public function openLoginForm()
    {
        $errorMsg = null;
        return view('login', compact('errorMsg'));
    }

    // Register new user & validation
    // Redirects to login page after successful registration
    public function register()
    {
        $validate = new Validation;

        $validate->trimPost($_POST);

        if (!$validate->checkIfEmpty($_POST)) {
            $message = 'Fields cannot be empty';
            return view('register', compact('message'));
        }

        if (!$validate->matchPassword(trim($_POST['password']), trim($_POST['passwordCheck']))) {
            $message = 'Passwords do not match, please check if you typed them correctly';
            return view('register', compact('message'));
        }

        if (!$validate->validatePassword(trim($_POST['password']))) {
            $message = 'Password must be at least 8 characters long';
            return view('register', compact('message'));
        }

        if (!$validate->validateEmail($_POST['email'])) {
            $message = 'Email already exists';
            return view('register', compact('message'));
        }

        unset($_POST['passwordCheck']);

        $user = $_POST; // Register form input values
        $user['password'] = md5($user['password']); // Password hashing

        App::get('database')->insert('users', $user); // Inserts form input values into 'users' table

        $regCompletedMsg = 'Registration completed successfully, you can now log in.';
        return view('login', compact('regCompletedMsg'));
    }

    public function login()
    {
        $validate = new Validation;

        $user = App::get('database')->select('users', ['email' => $_POST['email']]);

        if (!$validate->checkIfEmpty($_POST)) {
            $message = 'Fields cannot be empty';
            return view('login', compact('message'));
        }

        if (!$user) {
            $message = 'User does not exist';
            return view('login', compact('message'));
        }

        if (!$validate->matchPassword($user->password, md5($_POST['password']))) {
            $message = 'Incorrect password';
            return view('login', compact('message'));
        }

        unset($user->password);

        $_SESSION['user'] = $user;

        return header('Location: /');
    }

    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();

        return header('Location: /');
    }
}