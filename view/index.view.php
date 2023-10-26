<?php 
    require_once "basic/head.php";
    require_once "basic/nvar.php";
    $heading = "Home";
    $content = "Welcome to Home";
    require_once "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>
            <?php echo $content; ?>
        </h1>
    </div>
</main>
<?php require_once "basic/footer.php"; ?>