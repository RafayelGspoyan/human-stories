<?php require_once ROOT  . "/views/admin_header.php"?>
<!---->


<section>
    <div class="container">
        <div class="row">



            <div class="col-md-12 mt-2">
                <h4>News List</h4>
            </div>
            <div class="col-md-12 mt-2">
                <table class="table table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($newsList as $newsItem): ?>
                        <tr>

                            <td><?php echo $newsItem['id']; ?></td>
                            <td><?php echo $newsItem['category_id']; ?></td>
                            <td><?php echo $newsItem['title']; ?></td>
                            <td><?php echo $newsItem['date']; ?></td>
                            <td><a href="/admin/news/update/<?php echo $newsItem['id']; ?>" title="update"><i style="color: lightseagreen" class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/news/delete/<?php echo $newsItem['id']; ?>" title="delete"><i style="color: lightseagreen" class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        </div>

</section>

<?php require_once ROOT . "/views/admin_footer.php"?>

