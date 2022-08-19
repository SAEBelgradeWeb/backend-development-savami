<?php require('partials/head.php') ?>

<div class="container mx-auto">
    <div class="text-center">
        <h2 class="mt-8 mb-4 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
            Welcome to your management panel
            <span class="text-cyan-500"><?= $_SESSION['user']->firstname . ' ' . $_SESSION['user']->lastname ?></span>
        </h2>
        <p class="text-xs">Here you can see an overview of all your listings. You can either add new listings,
            edit,
            or
            delete them.</p>
        <p class="text-xs">Be careful, though! Once deleted it cannot be recovered.</p>
    </div>
    <div class="body-font overflow-hidden">
        <div class="container py-12 mx-auto">

            <div class="text-gray-900">
                <div class="p-4 flex justify-center">
                    <h1 class="text-3xl my-4 text-center font-bold text-slate-700">
                        All Listings
                    </h1>
                </div>
                <div>
                    <a href="/user/create"
                       class="inline-flex items-center justify-center w-10 h-10 ml-3 bg-indigo-400 hover:bg-indigo-500 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="32" height="32"
                             viewBox="0 0 32 32"
                             style=" fill:#fff;">
                            <path d="M 16 3 C 8.832031 3 3 8.832031 3 16 C 3 23.167969 8.832031 29 16 29 C 23.167969 29 29 23.167969 29 16 C 29 8.832031 23.167969 3 16 3 Z M 16 5 C 22.085938 5 27 9.914063 27 16 C 27 22.085938 22.085938 27 16 27 C 9.914063 27 5 22.085938 5 16 C 5 9.914063 9.914063 5 16 5 Z M 15 10 L 15 15 L 10 15 L 10 17 L 15 17 L 15 22 L 17 22 L 17 17 L 22 17 L 22 15 L 17 15 L 17 10 Z"></path>
                        </svg>
                    </a>
                </div>
                <div class="px-3 py-4 flex justify-center mb-20">
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <tbody>
                        <tr class="border-b bg-blue-700 text-white">
                            <th class="text-left p-3 px-5">Title</th>
                            <th class="text-left p-3 px-5">Description</th>
                            <th></th>
                        </tr>
                        <?php foreach ($listings as $listing) : ?>
                            <tr class="border-b hover:bg-indigo-200 transition ease-in-out delay-50 bg-gray-100">
                                <td class="p-3 px-5"><?= $listing->title ?></td>
                                <td class="p-3 px-5"><?= substr($listing->description, 0, 50) ?></td>
                                <td class="p-3 px-5 flex justify-end">
                                    <a href="/user/edit?id=<?= $listing->id ?>"
                                       class="mr-3 text-sm bg-amber-500 hover:bg-amber-600 text-white py-1 px-1 rounded transition ease-in-out delay-50 focus:outline-none focus:shadow-outline">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                             width="24" height="24"
                                             viewBox="0 0 24 24"
                                             style=" fill:#fff;">
                                            <path d="M 16.9375 1.0625 L 3.875 14.125 L 1.0742188 22.925781 L 9.875 20.125 L 22.9375 7.0625 C 22.9375 7.0625 22.8375 4.9615 20.9375 3.0625 C 19.0375 1.1625 16.9375 1.0625 16.9375 1.0625 z M 17.3125 2.6875 C 18.3845 2.8915 19.237984 3.3456094 19.896484 4.0214844 C 20.554984 4.6973594 21.0185 5.595 21.3125 6.6875 L 19.5 8.5 L 15.5 4.5 L 16.9375 3.0625 L 17.3125 2.6875 z M 4.9785156 15.126953 C 4.990338 15.129931 6.1809555 15.430955 7.375 16.625 C 8.675 17.825 8.875 18.925781 8.875 18.925781 L 8.9179688 18.976562 L 5.3691406 20.119141 L 3.8730469 18.623047 L 4.9785156 15.126953 z"></path>
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
        </div>
    </div>
</div>

<script>
    function areYouSure() {
        if (confirm("Are you sure you want to delete this listing?"))
            location.href = '/user/delete?id=<?= $listing->id ?>';
    }
</script>

<?php require('partials/footer.php') ?>
