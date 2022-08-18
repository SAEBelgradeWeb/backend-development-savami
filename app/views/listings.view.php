<?php require('partials/head.php'); ?>

<div class="text-center mt-10">
    <h1 class="text-3xl">All Listings</h1>
</div>

<div class="p-10">
    <!--Card 1-->
    <div class=" w-4/6 lg:max-w-full lg:flex flex-col-reverse mx-auto">
        <?php foreach ($listings as $listing) : ?>
            <div class="border border-gray-200 bg-white rounded p-4 flex flex-col justify-between leading-normal mb-8 relative h-40 max-h-fit">
                <div class="">
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
