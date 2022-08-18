<?php require('partials/head.php') ?>

    <div class="container mx-auto text-center">
        <h2 class="text-3xl title-font mt-8">
            Hello <span class="font-bold text-cyan-500"><?= $_SESSION['user']->firstname . ' ' . $_SESSION['user']->lastname ?></span>
        </h2>
        <p class="my-4 text-xs text-gray-600">Here you can edit or delete any of the selected user's listings</p>
    </div>
    <div class="body-font overflow-hidden">
        <div class="px-3 py-4 flex justify-center mb-20">
            <table class="w-5/6 text-md bg-white shadow-md rounded mb-4">
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
                        <td class="p-3 px-5"><?php foreach ($users as $user) {
                                echo $user->firstname . " " . $user->lastname;
                            } ?></td>
                        <td class="p-3 px-5"><?= $listing->createdAt ?></td>
                        <td class="p-3 px-5 flex justify-end">
                            <a href="/admin-panel/listing/edit?id=<?= $listing->id ?>"
                               class="mr-3 text-sm bg-blue-400 hover:bg-blue-500 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                <svg class="hover:color-white"
                                     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="24" height="24"
                                     viewBox="0 0 24 24"
                                     style=" fill:#fff;">
                                    <path d="M 5 3 C 3.9069372 3 3 3.9069372 3 5 L 3 19 C 3 20.093063 3.9069372 21 5 21 L 19 21 C 20.093063 21 21 20.093063 21 19 L 21 12 L 19 12 L 19 19 L 5 19 L 5 5 L 12 5 L 12 3 L 5 3 z M 14 3 L 14 5 L 17.585938 5 L 8.2929688 14.292969 L 9.7070312 15.707031 L 19 6.4140625 L 19 10 L 21 10 L 21 3 L 14 3 z"></path>
                                </svg>
                            </a>
                            <button onclick="areYouSure()" type="button"
                                    class="text-sm bg-red-500 hover:bg-red-600 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="24" height="24"
                                     viewBox="0 0 30 30"
                                     style=" fill:#fff;">
                                    <path d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function areYouSure() {
            if (confirm("Are you sure you want to delete this listing?"))
                location.href = '/admin-panel/listing/delete?id=<?= $listing->id ?>';
        }
    </script>

<?php require('partials/footer.php') ?>