<?php 
    view("basic/head.php");
    view("basic/nvar.php");
    view("basic/body.php",['heading' => 'Edit']);
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- 
        <form action="/../../controller/posts/update.php" method="POST">
        <form action="/post" method="POST">
        -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $post["id"] ?>">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="post" class="block text-sm font-medium leading-6 text-gray-900">Post</label>
                            <div class="mt-2">
                                <textarea id="post" name="post" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $post['post'] ?></textarea>
                                <?php if(isset($err['post'])) :?>
                                  <p class="text-red-500 test-xs mt-2"><?= $err['post'] ?></p>
                                <?php endif ?>
                              </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="/post/"
                                class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                        
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php view("basic/footer.php"); ?>