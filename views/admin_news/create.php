<?php include ROOT . '/views/admin_header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
                <h4>Add New News</h4>
            </div>
        </div>
        <div class="row">

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="error" style="list-style: none"> <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="title">News Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="">
                    </div>
                    <div class="form-group w3-border-black">
                        <h4><b>Please choose category</b></h4>
                    <?php
                    $i = 0;
                        while ($i < count($category)){?>
                            <input type="radio" id="<?= $category[$i]["id"] ?>" name="category" value="<?= $category[$i]["id"] ?>">
                            <label for="<?= $category[$i]["id"] ?>"><?=  $category[$i]["name"] ?></label><br>
                            
                        <?php
                            $i++;
                        }
                    ?>
                    </div>
                    <div class="form-group">
                        <label for="short_content">Short Content</label>
                        <textarea name="short_content" class="form-control" id="short_content" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" rows="8"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="thumb">News Image</label>
                        <input name="image" type="file" class="form-control-file" id="thumb">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="update">
                </form>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin_footer.php'; ?>

