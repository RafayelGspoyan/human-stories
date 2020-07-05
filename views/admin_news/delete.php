<?php include ROOT . '/views/admin_header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h4>Remove news #<?= $id; ?></h4>
                    <p>Are you sure delete this news?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form action="" method="post">
                        <input type="submit" name="submit" class="btn btn-primary" value="Delete">
                    </form>
                </div>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/admin_footer.php'; ?>