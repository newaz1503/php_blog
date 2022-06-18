<?php
    $posts = $blog->blog_post();
?>

<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <?php foreach ($posts as $post) { ?>
                <div class="item">
                    <img src="admin/uploads/post/<?php echo $post['image'] ?>" alt="<?php echo $post['title'] ?>" height="320" style="object-fit: cover">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span><?php echo $post['name'] ?></span>
                            </div>
                            <a href="post_details.php?status=post_details&&id=<?php echo $post['id'] ?>"><h4><?php echo $post['title'] ?></h4></a>
                            <ul class="post-info">
                                <li><a href="#"><?php echo $post['author'] ?></a></li>
                                <li><a href="#"><?php echo date('F j, Y', strtotime($post['date'])) ?></a></li>
                                <li><a href="#"><?php echo $post['comment'] ?> Comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

