<?php

/* ============================================
 *             Standard Redirects
============================================ */
$router->get('', 'PagesController@home');
$router->get('listings', 'UsersListingsController@listings'); // All listings page

/* ============================================
 *              Login / Register
============================================ */
$router->get('register', 'AuthController@openRegisterForm'); // Registration form page
$router->post('register', 'AuthController@register'); // Registration form POST submission

$router->get('login', 'AuthController@openLoginForm'); // Login form page
$router->post('login', 'AuthController@login'); // Login form POST submission

$router->get('logout', 'AuthController@logout'); // Logging out by ending SESSION

/* ============================================
 *                  Profile
============================================ */
$router->get('profile', 'AuthController@openProfileForm', 'auth'); // Opens profile form
$router->post('profile/update', 'AuthController@updateProfile', 'auth'); // Updates profile
$router->post('profile/update/image', 'AuthController@updateProfilePicture', 'auth');

/* ============================================
 *             User Management Panel
============================================ */
$router->get('user/listings', 'UsersListingsController@index', 'auth'); // User manage panel (all user's listings)
$router->get('user/edit', 'UsersListingsController@edit', 'auth'); // Edit user's listing
$router->post('user/update', 'UsersListingsController@update', 'auth'); // Update edit of listing POST submission
$router->get('user/create', 'UsersListingsController@create', 'auth'); // Create listing
$router->post('user/create', 'UsersListingsController@store', 'auth'); // Listing create POST submission
$router->get('user/delete', 'UsersListingsController@delete', 'auth'); // Deletes selected listing

/* ============================================
 *                 Admin Panel
============================================ */
$router->get('admin-panel', 'AdminPanelController@index', 'auth', 'admin'); // Opens admin panel "home"
$router->get('admin-panel/user/delete', 'AdminPanelController@deleteUser', 'auth', 'admin'); // Delete user while logged in as admin
$router->get('admin-panel/listing/delete', 'AdminPanelController@delete', 'auth', 'admin'); // Delete listing while logged in as admin
$router->get('admin-panel/user/listings', 'AdminPanelController@listings', 'auth', 'admin'); // See user's listings logged in as admin
$router->get('admin-panel/listing/edit', 'AdminPanelController@edit', 'auth', 'admin'); // Edit selected user's listing
$router->post('admin-panel/listing/update', 'AdminPanelController@update', 'auth', 'admin'); // Apply edited changes to listing
$router->post('admin-panel/user/update', 'AdminPanelController@updateUser', 'auth', 'admin'); // Change user (done on home view of admin panel) and update changes. !!! CHANGING ROLES NOT WORKING !!!