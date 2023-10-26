<?php 
    require "basic/head.php";
    require "basic/nvar.php";
    $heading = "Create";
    require "basic/body.php";
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="#" method="POST">
            <label for="body">
                Description:
            </label>
            <div>
                <textarea name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <button>Submit</button>
        </form>
    </div>
</main>
<?php require "basic/footer.php"; ?>