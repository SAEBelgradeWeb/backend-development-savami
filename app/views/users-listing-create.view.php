<?php require ('partials/head.php'); ?>

<div class="container mx-auto items-center">
    <h1>Create new job listing</h1>

    <form action="/user/create" method="POST" class="w-full px-8 pt-6 pb-8 mb-4 bg-white rounded">
        <div class="container mx-auto">

            <div class="mb-4 md:mr-2">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="w-1/2 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4 md:mr-2">
                <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Description</label>
                <textarea name="description" id="description" cols="84" rows="20" class="resize border"></textarea>
            </div>

            <button type="submit" class="w-1/2 px-4 py-2 mt-7 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">Create Job Listing</button>
        </div>
    </form>
</div>

<?php require('partials/footer.php'); ?>