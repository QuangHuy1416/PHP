<?php 
    require "basic/head.php";
    require "basic/nvar.php";
    $heading = "Home";
    $content = "Welcome to Home";
    require "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>
            <?php echo $content; ?>
        </h1>
    </div>
</main>
<?php require "basic/footer.php"; ?>