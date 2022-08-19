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

    public function openProfileForm()
    {
        $errorMsg = null;
        return view('profile', compact('errorMsg'));
    }

    // Register new user & validation
    // Redirects to login page after successful registration
    public function register()
    {
        $validate = new Validation;

        $validate->trimPost($_POST);

        if (!$validate->checkIfEmpty($_POST)) {
            $errorMsg = 'Fields cannot be empty';
            return view('register', compact('errorMsg'));
        }

        if (!$validate->matchPassword(trim($_POST['password']), trim($_POST['passwordCheck']))) {
            $errorMsg = 'Passwords do not match, please check if you typed them correctly';
            return view('register', compact('errorMsg'));
        }

        if (!$validate->validatePassword(trim($_POST['password']))) {
            $errorMsg = 'Password must be at least 8 characters long';
            return view('register', compact('errorMsg'));
        }

        if (!$validate->validateEmail($_POST['email'])) {
            $errorMsg = 'Email already exists';
            return view('register', compact('errorMsg'));
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
            $errorMsg = 'Fields cannot be empty';
            return view('login', compact('errorMsg'));
        }

        if (!$user) {
            $errorMsg = 'User does not exist';
            return view('login', compact('errorMsg'));
        }

        if (!$validate->matchPassword($user->password, md5($_POST['password']))) {
            $errorMsg = 'Incorrect password';
            return view('login', compact('errorMsg'));
        }

        unset($user->password);

        $_SESSION['user'] = $user;

        return header('Location: /');
    }

    public function updateProfile()
    {
        $validate = new Validation;

        $validate->trimPost($_POST);

        if (!$validate->checkIfEmpty($_POST)) {
            $errorMsg = 'Fields cannot be empty';
            if ($_SESSION['user']->role_id == '1') {
                return view('admin-profile', compact('errorMsg'));
            } else {
                return view('profile', compact('errorMsg'));
            }
        }

        if (!$validate->matchPassword(trim($_POST['password']), trim($_POST['passwordCheck']))) {
            $errorMsg = 'Passwords do not match, please check if you typed them correctly';
            return view('profile', compact('errorMsg'));
        }

        if (!$validate->validatePassword(trim($_POST['password']))) {
            $errorMsg = 'Password must be at least 8 characters long';
            return view('profile', compact('errorMsg'));
        }

        if (!$validate->validateEmail($_POST['email'])) {
            $errorMsg = 'Email already exists';
            return view('register', compact('errorMsg'));
        }

        $query = "UPDATE users SET firstname=?, lastname=?, username=?, email=?, password=? WHERE id=?";
        App::get('database')->update(
            $query, [
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['username'],
                $_POST['email'],
                md5($_POST['password']), // Hashed password
                $_SESSION['user']->id]); // Where ID = ID from currently logged-in user

        unset($_POST['passwordCheck']);

        sleep(6);
        $this->logout();

        return view('index');
    }



    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();

        return header('Location: /');
    }
}