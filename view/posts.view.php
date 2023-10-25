<?php 
    require "basic/head.php";
    require "basic/nvar.php";
    $heading = "Posts";
    require "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach($posts as $post) : ?>
            <li>
                <a href="/post?id=<?= $post['id'] ?>">    
                    <?= $post['post'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </div>
</main>
<?php require "basic/footer.php"; ?>