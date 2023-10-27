<?php 
    view("basic/head.php");
    view("basic/nvar.php");
    view("basic/body.php",['heading' => 'Post']);
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
            <a href="/view/posts/post-create.view.php" class="text-blue-500 hover:underline">
                Create post.
            </a>
        </p>
    </div>
</main>
<?php view("basic/footer.php"); ?>