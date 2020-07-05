<?php include ROOT . '/views/admin_header.php'; ?>

<section>
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">News Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="<?= $newsItem['title']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="short_content">Short Content</label>
                        <textarea name="short_content" class="form-control" id="short_content" rows="4"><?= $newsItem['short_content']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" rows="8"><?= $newsItem['content']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <p>Current news Image</p>
                        <img src="<?=$newsItem['image']; ?>" alt="" width="300px">
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

