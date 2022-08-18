<?php

namespace App\Controllers;
use App\Core\App;

class AdminPanelController
{
    public function index()
    {
        $amountOfListings = App::get('database')->count('listings');
        $amountOfUsers = App::get('database')->count('users');
        $users = App::get('database')->sql(
            "SELECT users.id, users.firstname, users.lastname, users.email, roles.type
            FROM users
            LEFT JOIN roles ON users.role_id = roles.id
            ");
        $listingsQuery = 'SELECT * FROM listings';
        $listings = App::get('database')->sql($listingsQuery);

        return view('admin-panel', compact('amountOfListings', 'amountOfUsers', 'users', 'listings'));
    }

    public function edit()
    {
        $query = "SELECT * FROM listings WHERE id = " . $_GET['id'];
        $listing = App::get('database')->sql($query);

        return view('admin-panel-listing-edit', compact('listing'));
    }

    public function listings()
    {
        $query = "SELECT * FROM listings WHERE user_id = " . $_GET['user_id'];
        $usersQuery = "SELECT * FROM users WHERE id = " . $_GET['user_id'];
        $listings = App::get('database')->sql($query);
        $users = App::get('database')->sql($usersQuery);

        return view('admin-panel-listings', compact('listings', 'users'));
    }

    public function delete()
    {
        $query = 'DELETE FROM listings WHERE id = ' . $_GET['id'];
        App::get('database')->sql($query);

        return redirect('admin-panel');
    }

    public function deleteUser()
    {
        $query = 'DELETE FROM users WHERE id = ' . $_GET['id'];
        App::get('database')->sql($query);

        return redirect('admin-panel');
    }

    public function update()
    {
        $query = "UPDATE listings SET title=?, description=? WHERE id=?";
        App::get('database')->update($query, [$_POST['title'], $_POST['description'], $_POST['id']]);

        return redirect('admin-panel');
    }

    public function updateUser() // Works for everything except for role_id/type
    {
        $query = "UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?";
        App::get('database')->update($query, [$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['id']]);

        return redirect('admin-panel');
    }

    public function create()
    {
        return view('users-listing-create');
    }
}