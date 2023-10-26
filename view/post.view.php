<?php 
    require_once "basic/head.php";
    require_once "basic/nvar.php";
    $heading = "Posts";
    require_once "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($post['post']) ?></p>
        <a href="/post"> Back</a>
    </div>
</main>
<?php require_once "basic/footer.php"; ?>