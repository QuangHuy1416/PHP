<?php 
    view("basic/head.php");
    view("basic/nvar.php");
    view("basic/body.php",['heading' => 'Posts']);
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($post['post']) ?></p>
        <a href="/post"> Back</a>
    </div>
</main>
<?php view("basic/footer.php"); ?>