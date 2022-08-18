<?php require('partials/head.php') ?>

<div class="container mx-auto w-1/2 text-center">
    <h1 class="title-font font-light sm:text-4xl text-3xl text-center mb-4 font-medium text-slate-700 mt-8">Currently Editing <span class="font-sans font-bold text-cyan-500"><?= $listing[0]->title ?></span></h1>

    <form action="/user/update" method="POST" class="w-full px-8 pt-6 pb-8 mb-4 bg-white rounded">
        <input type="hidden" name="id" value="<?= $listing[0]->id ?>"/>
        <div class="container mx-auto">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label for="title" class="text-left block ml-1 font-sans text-sm font-bold text-gray-700">Title</label>
                <input id="title" name="title" type="text" value="<?= $listing[0]->title?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"/>

                <div class="my-4 md:mr-2 md:mb-0">
                    <label for="description" class="text-left block font-sans mb-1 ml-1 text-sm font-bold text-gray-700">Description</label>
                    <textarea class="font-sans text-sm w-full border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="description" id="description" cols="" rows="10"><?= $listing[0]->description?></textarea>
                </div>

                <button type="submit" class="w-1/2 mt-4 px-4 py-2 font-bold text-white bg-blue-500 rounded-full transition ease-in-out delay-50 hover:bg-blue-700 focus:outline-none focus:shadow-outline my-2">Update Listing</button>
            </div>
        </div>
    </form>
</div>

<?php require('partials/footer.php') ?>
