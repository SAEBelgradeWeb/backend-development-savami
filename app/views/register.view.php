<?php
require('partials/head.php');
?>

<?php // Logic same as login.view.php -- Read comments in that file
if ($_SESSION) {
    return redirect('/');
}
?>

<?php // If a $message is found (in AuthController) it means there is an error. Displays error message.
if (isset($errorMsg)) : ?>
    <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 my-8">
        <div class="flex items-center justify-center w-12 bg-red-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                <p class="text-sm text-gray-600 dark:text-gray-200"><?= $errorMsg ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<h1 class="text-xl text-center mt-8">Register</h1>
<div class="block p-6 rounded-lg shadow-lg bg-white max-w-md mx-auto mb-20">
    <form method="POST" action="/register">
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="firstname"></label>
                <input type="text" id="firstname" name="firstname"
                       class="form-control
                       block
                       w-full
                       px-3
                       py-1.5
                       text-base
                       font-normal
                       text-gray-700
                       bg-white bg-clip-padding
                       border border-solid border-gray-300
                       rounded
                       transition
                       ease-in-out
                       m-0
                       focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="First name">
            </div>
            <div class="form-group mb-6">
                <label for="lastname"></label>
                <input type="text" id="lastname" name="lastname"
                       class="form-control
                       block
                       w-full
                       px-3
                       py-1.5
                       text-base
                       font-normal
                       text-gray-700
                       bg-white bg-clip-padding
                       border border-solid border-gray-300
                       rounded
                       transition
                       ease-in-out
                       m-0
                       focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Last name">
            </div>
        </div>
        <div class="form-group mb-6">
            <label for="username"></label>
            <input type="text" id="username" name="username"
                    class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Username">
        </div>
        <div class="form-group mb-6">
            <label for="email"></label>
            <input type="email" id="email" name="email"
                    class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Email address">
        </div>
        <div class="form-group mb-6">
            <label for="password"></label>
            <input type="password" id="password" name="password"
                    class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Password">
        </div>
        <div class="form-group mb-6">
            <label for="passwordCheck"></label>
            <input type="password" id="passwordCheck" name="passwordCheck"
                    class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Confirm password">
        </div>
        <button type="submit"
                  class="
                  w-full
                  px-6
                  py-2.5
                  bg-blue-600
                  text-white
                  font-medium
                  text-xs
                  leading-tight
                  uppercase
                  rounded
                  shadow-md
                  hover:bg-blue-700 hover:shadow-lg
                  focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                  active:bg-blue-800 active:shadow-lg
                  transition
                  duration-150
                  ease-in-out">
            Register account
        </button>
    </form>
</div>

<?php require('partials/footer.php');
