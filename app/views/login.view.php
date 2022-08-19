<?php
require('partials/head.php');
?>


<?php // Once session stars when logged in, redirects back to home
if ($_SESSION) {
    return redirect('/');
} ?>

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

<div class="w-1/3 mx-auto">
    <h1 class="my-8 mb-12 text-center font-sans font-bold text-3xl text-slate-700">Log In</h1>

    <form action="/login" method="POST">
        <div class="relative z-0 mb-6 w-full group"">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="email" id="email"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " value="<?php if (isset($_POST['email'])) {
                    echo $_POST['email'];
                } ?>"/>
                <label for="email"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    E-mail address</label>
            </div>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input type="password" name="password" id="password"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="password"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password
            </label>
        </div>

        <div class="text-center my-8 w-full mx-auto">
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 transition ease-in-out delay-50">
                Log In
            </button>
        </div>
    </form>

    <div class="text-sky-500 text-center mt-6 underline">
        <a href="/register">Don't have an account?</a>
    </div>
</div>

<?php require('partials/footer.php'); ?>
