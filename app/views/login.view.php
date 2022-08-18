<?php
require('partials/head.php');
?>


<?php // Once session stars when logged in, redirects back to home
if ($_SESSION) { return redirect('/'); } ?>

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

<?php // If registration completed successfully $regCompletedMsg will be set and will redirect to /login, so the $regCompletedMsg has to display on /login
if (isset($regCompletedMsg)) : ?>
<div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 my-8">
    <div class="flex items-center justify-center w-12 bg-green-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
        </svg>
    </div>

    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            <span class="font-semibold text-green-500 dark:text-green-400">Success</span>
            <p class="text-sm text-gray-600 dark:text-gray-200"><?= $regCompletedMsg ?></p>
        </div>
    </div>
</div>
<?php endif; ?>

<h1 class="text-xl text-center mt-8">Log In</h1>
<div class="flex justify-center">
<div class="block p-6 rounded-lg shadow-lg bg-white w-1/2 mb-40">
    <form method="POST" action="/login" class="justify-center align-center">
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
            Log In
        </button>
    </form>

    <div class="text-sky-500 text-center mt-6 underline">
        <a href="/register">Don't have an account?</a>
    </div>
</div>
</div>

<?php require('partials/footer.php');?>
