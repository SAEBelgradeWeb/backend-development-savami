<?php

namespace App\Controllers;
use App\Core\App;

class UsersListingsController
{
    public function index()
    {
        $query = 'SELECT * FROM listings WHERE user_id = ' . $_SESSION['user']->id;
        $listings = App::get('database')->sql($query);

        return view('users-listings', compact('listings'));
    }

    public function listings()
    {
        $query = "SELECT * FROM listings";
        $usersQuery = "SELECT * FROM users";
        $listings = App::get('database')->sql($query);
        $users = App::get('database')->sql($usersQuery);

        return view('listings', compact('listings', 'users'));
    }


    public function edit()
    {
        $query = "SELECT * FROM listings WHERE id = " . $_GET['id'];
        $listing = App::get('database')->sql($query);

        return view('users-listing-edit', compact('listing'));
    }

    public function delete()
    {
        $query = 'DELETE FROM listings WHERE id =' . $_GET['id'];
        App::get('database')->sql($query);

        return redirect('user/listings');
    }

    public function update()
    {
        $query = "UPDATE listings SET title=?, description=? WHERE id=?";
        App::get('database')->update($query, [$_POST['title'], $_POST['description'], $_POST['id']]);

        if ($_SESSION['user']->role_id == '1') {
            return redirect('listings');
        } else {
            return redirect('user/listings');
        }
    }

    public function create()
    {
        return view('users-listing-create');
    }

    public function store()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $userId = $_SESSION['user']->id;

        App::get('database')->insertListing(
            [
                $userId,
                $title,
                $description
            ]);

        return redirect('user/listings');
    }

    public function openProfileForm()
    {
        $query = 'SELECT * FROM users WHERE id = ' . $_SESSION['user']->id;
        $user = App::get('database')->sql($query);

        return view('profile', compact('user'));
    }

    public function updateUserProfile()
    {
        $query = "UPDATE users SET firstname=?, lastname=?, username=?, email=?, password=? WHERE id=?";
        App::get('database')->update($query, [$_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'], $_SESSION['user']->id]);

        return redirect('user/profile');
    }
}