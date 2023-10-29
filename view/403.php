<?php 
    view("basic/head.php");
    view("basic/nvar.php");
    view("basic/body.php",['heading' => 'You are not authorized to view this page!']);
    $content = '403.';
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>
            <?php echo $content; ?>
        </h1>
    </div>
</main>
<?php view("basic/footer.php"); ?>