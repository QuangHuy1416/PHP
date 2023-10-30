<?php 
    view("basic/head.php");
    view("basic/nvar.php");
    view("basic/body.php",['heading' => 'Posts']);
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($post['post']) ?></p>
        <a href="/post" class="text-blue-500">Back</a>
        <form method="POST" class="mt-6">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $post["id"] ?>">
            <button class="text-sm text-red-500">Delete</button>
        </form>
        <footer class="mt-6">
            <a href="/post/edit?id=<?= $post["id"]?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Edit
            </a>
        </footer>
    </div>
</main>
<?php view("basic/footer.php"); ?>