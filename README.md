# CRUD Final Project for SAE Institute 2022 by Sava Miljkovic

## NOTE: Not fully optimized for lower resolutions (styling was not a priority)

## KNOWN BUGS
1. When pressing twice on "update profile and log out" on the profile page, it goes to the 404 page
    - For example: You enter wrong format in the form and receive an error the path will be /profile/update
    - When submitting the form another time, the URL path will be /profile/profile/update resulting in a 404 page.
2. All listings page edit/delete buttons get duplicated because of user profile picture
3. Registration & profile update form validation does not scan for existing e-mail adresses properly

### Login Information
##### To log in as admin user:
- sava@outlook.com
- Adminpass123!

##### To log in as a regular user:
- Create an account by using the registration form

## Admin Functionality
### Basic
- Admin Panel navigation button that only displays when logged in as admin
- Ability to edit/delete listings from the "Check all listings" page
    - User can only edit/delete listings that the user is owner of
    - Admin can edit/delete all

### Admin Panel
#### Shows total amount of posts and total amount of users at the top of the admin panel
#### Completely separate AdminController for all admin actions, even if it's just editing/deleting

- #### All Users Form
  - Ability to change user's first name, last name, and email
  - Apply all changes button located at the bottom of the "All Users" table
#### NOTE: The intention was to have the ability to change user roles (admin/user), however I did not manage to finish this
 
- #### All Listings Table
  - Located below the "All Users" form
  - A quick overview of all listings with 2 buttons that redirect to edit/delete

## User Functionality
- Instead of an admin panel button, a "manage listings" button will be displayed in the navigation bar
- Ability to see all their listings on the management panel and add/edit/delete them
- Ability to edit/delete from the "Check all listings" 

## Profile Page (both admin & user
- Allows the currently logged in user to change his/her account details.
  - Name
  - Username
  - Email
  - New password
  - Add a profile picture

## Unfinished ideas
- Deleting old not-in-use profile pictures from the profile-pictures folder
- ~Add image upload to profile page & database~
- ~A small profile div on the user's management page that allows the user to change their name, email and password~
- ~Proper register and profile update validation~
- ~Adding a profile picture to the user~
- ~Displaying the profile picture on the "Check All Listings" page~
- Being able to change the user role through the admin panel
- Being able to fully manage the database through the admin panel, without having to use a database client
- ~Changing user information (name, username, email, password)~
- There are a lot of styling bugs (mostly used tailwind components that were slightly edited and therefore breaking them slightly)
- ~There might be small redirection errors that I have overlooked. I only had 30 minutes to test the whole functionality.~
- ~There might be some pages that lack styling~

## Styling
- All styling is done by using the Tailwind CDN
- Most elements are edited existing tailwind components (to save time)
  - Source of the components was mostly flowbite.com, tailwindcomponents.com, and the Tailwind docs/components itself, but in some cases other websites were used.

## JavaScript
JavaScript was not used much throughout the project. It was used in the following cases:
- Deleting a user/listing -> Confirms "Are you sure?" and redirects
- On the profile page, when clicking the apply changes button, within PHP the function sleeps for 6 seconds. In these 6 seconds JavaScript is used to display 2 messages.
  - Message 1: Confirms the changes have been made successfully
  - Message 2: Notifies the user they will be logged out to apply the changes
  - Proceeds to kill the session and redirects back to the home page
- Displaying messages when uploading image
