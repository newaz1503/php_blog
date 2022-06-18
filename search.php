<?php
    include("admin/code.php");
    $blog = new BlogCode();
    $categories = $blog->view_category();
    if (isset($_GET['query'])){
        $search_text = strtolower($_GET['query']);
        $search_posts = $blog->search_post($search_text);
//        print_r($search_posts);
    }

?>


<?php include_once('includes/header.php') ?>

<!-- Page Content -->

<?php include_once('includes/banner.php') ?>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <!--Blog post-->
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php if(mysqli_num_rows($search_posts) > 0) { ?>
                            <?php foreach ($search_posts as $post) { ?>
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="admin/uploads/post/<?php echo $post['image'] ?>" class="img-fluid " alt="<?php echo $post['title'] ?>">
                                        </div>
                                        <div class="down-content">
                                            <a href="post_details.php?status=post_details&&id=<?php echo $post['id'] ?>"><h4><?php echo $post['title'] ?></h4></a>
                                            <ul class="post-info">
                                                <li><a href="#"><?php echo $post['author'] ?></a></li>
                                                <li><a href="#"><?php echo date('F j, Y', strtotime($post['date'])) ?></a></li>
                                                <li><a href="#"><?php echo $post['comment'] ?> Comments</a></li>
                                            </ul>
                                            <p>
                                                <?php echo $post['description'] ?>
                                            </p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-tags">
                                                            <?php echo $post['tag'] ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <h4 class="p-2 text-danger text-center rounded-sm ">Data not found</h4>
                        <?php }  ?>
                    </div>
                </div>
            </div>
            <?php include_once('includes/sidebar.php') ?>
        </div>
    </div>
</section>


<?php include_once('includes/footer.php') ?>
