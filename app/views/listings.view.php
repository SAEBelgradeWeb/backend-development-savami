<?php require('partials/head.php'); ?>

<?php // Once session stars when logged in, redirects back to home
if (!$_SESSION) {
    redirect('login');
} ?>

<div class="text-center mt-10 relative w-5/6 mx-auto">
    <button onclick="history.go(-1);" class="absolute top-2 left-10">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30" height="30">
            <path style="fill:#232326"
                  d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                  data-name="Left"/>
        </svg>
    </button>
    <h1 class="text-3xl font-sans font-bold text-slate-700">All Listings</h1>
</div>

<div class="p-10">

    <div class=" w-5/6 lg:max-w-full lg:flex flex-col-reverse mx-auto">

        <?php foreach ($listings as $listing) : ?>
            <div class="border border-gray-200 bg-white rounded p-4 flex flex-col justify-between leading-normal mb-8 relative h-40 max-h-fit hover:border-blue-400 transition ease-in-out delay-50">
                <div>
                    <div class="text-gray-900 font-bold text-xl mb-2"><?= $listing->title ?></div>
                    <p class="text-gray-700 text-base w-1/2"><?= substr($listing->description, 0, 50) ?></p>
                </div>
                <div class="text-xs absolute top-2 right-2">
                    <?php foreach ($users as $user) : ?>
                        <?php if ($user->id == $listing->user_id) : ?>
                            <!-- Comment below placeholder for user profile picture being displayed in listing view -->
                            <!--<img class="w-10 h-10 rounded-full mr-4" src="" alt="Avatar of Author">-->
                            <p class="text-gray-400 text-right text-xs leading-none mb-2"><?= $user->firstname . " " . $user->lastname ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <p class="text-gray-400 align-center text-right">Created at</p>
                    <p class="text-gray-400 align-center"><?= $listing->createdAt ?></p>

                </div>
                <?php if ($_SESSION['user']->role_id == '1') : ?>
                    <div class="absolute bottom-2 right-2">
                        <a href="/user/edit?id=<?= $listing->id ?>"
                           class="mr-3 text-sm bg-amber-500 hover:bg-amber-600 text-white py-1.5 px-2 transition ease-in-out delay-50 rounded focus:outline-none focus:shadow-outline text-center">
                            Edit
                        </a>
                        <button onclick="areYouSure()" type="button"
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded transition ease-in-out focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                    </div>
                <?php endif ?>
                <?php if ($_SESSION['user']->id == $listing->user_id) : ?>
                    <div class="absolute bottom-2 right-2">
                        <a href="/user/edit?id=<?= $listing->id ?>"
                           class="mr-3 text-sm bg-amber-500 hover:bg-amber-600 text-white py-1.5 px-2 transition ease-in-out delay-50 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </a>
                        <button onclick="areYouSure()" type="button"
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-1 rounded transition ease-in-out focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function areYouSure() {
        if (confirm("Are you sure you want to delete this listing?"))
            location.href = '/user/delete?id=<?= $listing->id ?>';
    }
</script>

<?php require('partials/footer.php'); ?>
