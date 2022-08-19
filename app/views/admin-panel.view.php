<?php
require('partials/head.php');
?>

<div class="px-4 mx-auto sm:max-w-xl md_max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 my-6">
    <div class="p-8 rounded shadow-xl sm:p-16">
        <div class="flex flex-col lg:flex-row">
            <div class="mb-6 lg:mb-0 lg:w-1/2 lg:pr-5">
                <h2 class="font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                    <span class="text-cyan-500"><?= $_SESSION['user']->firstname . " " . $_SESSION['user']->lastname ?>'s</span>
                    Admin Panel
                </h2>
            </div>

            <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="text-base text-gray-700">
                    <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl text-center"><?= $amountOfListings ?></h6>
                    <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base"> Posts</p>
                </div>
            </div>
            <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="text-base text-gray-700">
                    <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl text-center"><?= $amountOfUsers ?></h6>
                    <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base text-center"> Users</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-gray-900 bg-gray-200">
    <div class="p-4 relative">
        <div class="text-xs text-right absolute bottom-0 right-4 text-gray-500 italic">
            <p>Click on any field to edit it & apply changes by clicking the save button</p>
            <p>Open all user's listings by clicking the blue button</p>
            <p>Delete user by clicking the red button</p>
        </div>
        <h1 class="text-3xl mt-4 mb-4 text-center font-bold text-slate-700">
            All Users
        </h1>
    </div>
    <div>
        <div class="px-3 py-4 flex justify-center">
            <form action="admin-panel/user/update" method="POST" class="w-full text-md bg-white shadow-md rounded mb-4">
                <table class="w-full text-md bg-white rounded">
                    <tbody>
                    <tr class="border-b bg-blue-700 text-white">
                        <th class="text-left p-3 px-5">First Name</th>
                        <th class="text-left p-3 px-5">Last Name</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Role</th>
                        <th></th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr class="border-b hover:bg-indigo-200 transition ease-in-out delay-50 bg-gray-100">
                            <td class="p-3 px-5">
                                <label for="id"></label>
                                <input type="hidden" name="id" id="id" value="<?= $user->id ?>">
                                <label for="firstname"></label>
                                <input type="text" id="firstname" name="firstname" value="<?= $user->firstname ?>"
                                       class="rounded bg-transparent">
                            </td>
                            <td class="p-3 px-5">
                                <label for="lastname"></label>
                                <input type="text" id="lastname" name="lastname" value="<?= $user->lastname ?>"
                                       class="rounded bg-transparent">
                            </td>
                            <td class="p-3 px-5">
                                <label for="email"></label>
                                <input type="email" id="email" name="email" value="<?= $user->email ?>"
                                       class="rounded bg-transparent">
                            </td>
                            <!-- FORM WON'T WORK WITH THIS LAST PART -->
                            <td class="p-3 px-5">
                                <!-- $user->type displays the right value, but I cannot get it to work with the select input-->
                                <?= $user->type ?>
                                <!--                                <label for="type"></label>-->
                                <!--                                <select name="type" id="type" class="rounded bg-transparent">-->
                                <!--                                    <option value="1">admin</option>-->
                                <!--                                    <option value="2">user</option>-->
                                <!--                                </select>-->
                            </td>
                            <td class="p-3 px-5 flex justify-end">
                                <a href="/admin-panel/user/listings?user_id=<?= $user->id ?>"
                                   class="mr-3 text-sm bg-cyan-500 hover:bg-cyan-600 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#fff;">
                                        <path d="M 5 3 C 3.9069372 3 3 3.9069372 3 5 L 3 19 C 3 20.093063 3.9069372 21 5 21 L 19 21 C 20.093063 21 21 20.093063 21 19 L 21 12 L 19 12 L 19 19 L 5 19 L 5 5 L 12 5 L 12 3 L 5 3 z M 14 3 L 14 5 L 17.585938 5 L 8.2929688 14.292969 L 9.7070312 15.707031 L 19 6.4140625 L 19 10 L 21 10 L 21 3 L 14 3 z"></path>
                                    </svg>
                                </a>
                                <a href="/admin-panel/user/delete?id=<?= $user->id ?>"
                                   class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 30 30"
                                         style=" fill:#fff;">
                                        <path d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit"
                            class="mr-3 text-sm bg-green-400 hover:bg-green-500 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline font-bold my-4">
                        Apply Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 relative">
            <div class="text-right absolute bottom-0 right-4 text-xs text-gray-500 italic">
                <p>Click on the orange button to edit the selected listing</p>
                <p>Click on the red button to delete the listing</p>
            </div>
            <h1 class="text-3xl mt-4 mb-4 text-center font-bold text-slate-700">
                All Listings
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                <tr class="border-b bg-blue-700 text-white">
                    <th class="text-left p-3 px-5">Title</th>
                    <th class="text-left p-3 px-5">Description</th>
                    <th class="text-left p-3 px-5">Author</th>
                    <th class="text-left p-3 px-5">Created At</th>
                    <th></th>
                </tr>
                <?php foreach ($listings as $listing) : ?>
                    <tr class="border-b hover:bg-indigo-200 transition ease-in-out delay-50 bg-gray-100">
                        <td class="p-3 px-5"><?= $listing->title ?></td>
                        <td class="p-3 px-5"><?= substr($listing->description, 0, 50) ?></td>
                        <?php foreach ($users as $user) : ?>
                            <?php if ($user->id == $listing->user_id) : ?>
                                <td class="p-3 px-5"><?= $user->firstname . " " . $user->lastname ?></td>
                            <?php endif ?>
                        <?php endforeach; ?>
                        <td class="p-3 px-5"><?= $listing->createdAt ?></td>
                        <td class="p-3 px-5 flex justify-end">
                            <a href="/admin-panel/listing/edit?id=<?= $listing->id ?>"
                               class="mr-3 text-sm bg-amber-500 hover:bg-amber-600 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="24" height="24"
                                     viewBox="0 0 24 24"
                                     style=" fill:#fff;">
                                    <path d="M 16.9375 1.0625 L 3.875 14.125 L 1.0742188 22.925781 L 9.875 20.125 L 22.9375 7.0625 C 22.9375 7.0625 22.8375 4.9615 20.9375 3.0625 C 19.0375 1.1625 16.9375 1.0625 16.9375 1.0625 z M 17.3125 2.6875 C 18.3845 2.8915 19.237984 3.3456094 19.896484 4.0214844 C 20.554984 4.6973594 21.0185 5.595 21.3125 6.6875 L 19.5 8.5 L 15.5 4.5 L 16.9375 3.0625 L 17.3125 2.6875 z M 4.9785156 15.126953 C 4.990338 15.129931 6.1809555 15.430955 7.375 16.625 C 8.675 17.825 8.875 18.925781 8.875 18.925781 L 8.9179688 18.976562 L 5.3691406 20.119141 L 3.8730469 18.623047 L 4.9785156 15.126953 z"></path>
                                </svg>
                            </a>
                            <a href="/admin-panel/listing/delete?id=<?= $listing->id ?>"
                               class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="24" height="24"
                                     viewBox="0 0 30 30"
                                     style=" fill:#fff;">
                                    <path d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php require('partials/footer.php') ?>

