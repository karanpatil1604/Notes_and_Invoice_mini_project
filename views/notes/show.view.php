<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>




<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-10"><a class="text-blue-400 hover:underline" href="/notes">Go to all Notes...</a></p>

        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <div class="mt-10">
            <a href="note/edit?id=<?= $note['note_id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 mt-6 text-sm font-semibold text-white shadow-sm
            hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600">Edit</a>
        </div>
    </div>
</main>
<?php require base_path("views/partials/foot.php") ?>