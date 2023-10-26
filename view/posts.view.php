<?php 
    require_once "basic/head.php";
    require_once "basic/nvar.php";
    $heading = "Posts";
    require_once "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach($posts as $post) : ?>
                <li>
                    <a href="/post?id=<?= $post['id'] ?>">    
                        <?= htmlspecialchars($post['post']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>
            <a href="/view/post-create.view.php" class="text-blue-500 hover:underline">
                Create post.
            </a>
        </p>
    </div>
</main>
<?php require_once "basic/footer.php"; ?>