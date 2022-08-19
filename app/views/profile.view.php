<?php require('partials/head.php'); ?>

<?php
if (!$_SESSION) { // If there is NOT an active logged-in user, go back to home. This form requires $_SESSION to work.
    return redirect('/');
}
?>
    <div class="w-full relative mt-0 shadow-2xl rounded mb-8 overflow-hidden">
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">
            <img src="../../public/images/profile-bg-banner.jpg"
                 alt="" class="bg w-full h-full object-cover object-center absolute z-0">
            <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                <img src="../../public/images/avatar-placeholder.png"
                     class="h-24 w-24 object-cover rounded-full">
                <h1 class="mt-4 text-2xl font-semibold"><?= $_SESSION['user']->firstname . " " . $_SESSION['user']->lastname ?></h1>
                <h4 class="text-sm font-semibold"><?= $_SESSION['user']->email ?></h4>
                <h4 class="text-sm font-semibold"><?= $_SESSION['user']->username ?></h4>
            </div>
        </div>
    </div>

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

<div id="updateCompleteMsg" class="p-2 bg-green-500 text-white mb-4 hidden w-1/2 mx-auto flex rounded">
    <div class="flex items-center justify-center w-12 bg-green-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
        </svg>
    </div>
    <span class="ml-8 text-white font-bold pointer transition delay-30 w-5/6 mx-auto" onclick="this.parentElement.style.display='none';">User profile updated successfully</span>
</div>

<div id="logoutNotif" class="p-2 bg-amber-500 text-white hidden w-1/2 mx-auto flex rounded">
    <div class="flex items-center justify-center w-12 bg-amber-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
            </svg>
        </div>
    <span class="ml-8 text-white font-bold pointer transition delay-30" onclick="this.parentElement.style.display='none';">You will be logged out in 5s to apply the changes</span>
</div>

    <div class="w-5/6 mx-auto">
        <h1 class="my-8 mb-12 text-center font-sans font-bold text-3xl text-slate-700">Change profile details</h1>

        <form action="profile/update" method="POST">
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="firstname" id="firstname"
                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " value="<?= $_SESSION['user']->firstname ?>"/>
                    <label for="firstname"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Change first name</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="lastname" id="lastname"
                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " value="<?= $_SESSION['user']->lastname ?>"/>
                    <label for="lastname"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Change last name</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="username" id="username"
                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " value="<?= $_SESSION['user']->username ?>"/>
                    <label for="username"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Change Username</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" name="email" id="email"
                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " value="<?= $_SESSION['user']->email ?>"/>
                    <label for="email"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Change e-mail
                        address</label>
                </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="password" id="password"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" "/>
                <label for="password"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New Password</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="passwordCheck" id="passwordCheck"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" "/>
                <label for="passwordCheck"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm new
                    password</label>
            </div>

            <div class="text-center my-8">
                <button type="submit" onclick="updateComplete()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition ease-in-out delay-50">
                    Apply Changes & Log Out
                </button>
            </div>
        </form>
    </div>

    <script>
        function updateComplete() {
           let updateCompleteMsg = document.querySelector('#updateCompleteMsg');
           let logoutNotif = document.querySelector('#logoutNotif');

           updateCompleteMsg.classList.remove('hidden');
           logoutNotif.classList.remove('hidden');
        }
    </script>

<?php require('partials/footer.php');