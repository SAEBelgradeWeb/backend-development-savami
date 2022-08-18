<header class="text-gray-600 body-font shadow-md">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <a href="/">
                <img src="../../../public/images/logo_transparent-cropped.png" alt="LeetJobs Logo"
                     class="w-20 h-20 text-white p-2">
            </a>
        </div>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="/"
               class="inline-flex
           items-center
           bg-cyan-500
           border-0
           py-1
           px-3
           font-bold
           focus:outline-none
           hover:bg-cyan-600
           transition-colors ease-in-out delay-50
           rounded
           text-base
           text-white
           mt-4
           mr-5
           md:mt-0">
                Home
            </a>

            <?php if (!$_SESSION) : ?>
                <a href="/login"
                   class="inline-flex
           items-center
           text-white
           font-semibold
           bg-green-400
           border-0
           py-1
           px-3
           focus:outline-none
           hover:bg-green-500
           transition ease-in-out delay-50
           rounded
           text-base
           mt-4
           mr-5
           md:mt-0">
                    Log In
                </a>

                <a href="/register"
                   class="inline-flex
           items-center
           text-white
           font-semibold
           bg-yellow-500
           border-0
           py-1
           px-3
           focus:outline-none
           hover:bg-yellow-600
           transition ease-in-out delay-50
           rounded
           text-base
           mt-4
           md:mt-0">
                    Register
                </a>
            <?php else : ?>

            <?php if ($_SESSION['user']->role_id == '1') : ?>
                <a href="/admin-panel"
                   class="inline-flex
           items-center
           text-white
           font-semibold
           bg-green-400
           border-0
           py-1
           px-3
           focus:outline-none
           hover:bg-green-500
           transition ease-in-out delay-50
           rounded
           text-base
           mt-4
           mr-5
           md:mt-0">
                    Admin Panel
                </a>
            <?php endif ?>

            <?php if ($_SESSION['user']->role_id == '2') : ?>
                <a href="/user/listings"
                   class="inline-flex
           items-center
           text-white
           font-semibold
           bg-green-400
           border-0
           py-1
           px-3
           focus:outline-none
           hover:bg-green-500
           transition ease-in-out delay-50
           rounded
           text-base
           mt-4
           mr-5
           md:mt-0">
                    Manage listings
                </a>
            <?php endif ?>

            <a href="/logout"
               class="inline-flex
           items-center
           text-white
           font-semibold
           bg-red-500
           border-0
           py-1
           px-3
           focus:outline-none
           hover:bg-red-600
           transition ease-in-out delay-50
           rounded
           text-base
           mt-4
           md:mt-0">
                Log Out
            </a>
        </nav>
        <?php endif; ?>
    </div>
</header>

