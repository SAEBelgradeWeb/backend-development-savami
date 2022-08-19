# CRUD Final Project for SAE Institute 2022 by Sava Miljkovic

## NOTE: Not fully optimized for lower resolutions (styling was not a priority)

## README

### Login Information
##### To log in as admin user:
- sava@outlook.com
- 12345678

##### To log in as a regular user:
- Create an account by using the registration form

## Admin Functionality
### Basic
- Admin Panel navigation button that only displays when logged in as admin
- Ability to edit/delete listings from the "Check all listings" page

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

## Unfinished ideas
~- A small profile div on the user's management page that allows the user to change their name, email and password~
- Adding a profile picture to the user
- Displaying the profile picture on the "Check All Listings" page
- Being able to change the user role through the admin panel
- Being able to fully manage the database through the admin panel, without having to use a database client
~- Changing user information (name, username, email, password)~
- There are a lot of styling bugs (mostly used tailwind components that were slightly edited and therefore breaking them slightly)
~- There might be small redirection errors that I have overlooked. I only had 30 minutes to test the whole functionality.~
~- There might be some pages that lack styling~

## Styling
- All styling is done by using the Tailwind CDN
- Most elements are edited existing tailwind components (to save time)
