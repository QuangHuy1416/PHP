<?php 
    require "basic/head.php";
    require "basic/nvar.php";
    $heading = "Posts";
    require "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= $post['post'] ?></p>
        <a href="/post"> Back</a>
    </div>
</main>
<?php require "basic/footer.php"; ?>