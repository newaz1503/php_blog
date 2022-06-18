<?php
    $recent_posts = $blog->recent_post();
?>

<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="search.php" class="d-flex">
                        <input type="text" name="query" class="searchText" placeholder="type to search..." autocomplete="on">
<!--                        <button type="submit" name="search_btn" class="border-0" style="cursor: pointer">Search</button>-->
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <?php foreach ($recent_posts as $post) { ?>
                                <li><a href="post_details.php?status=post_details&&id=<?php echo $post['id'] ?>">
                                        <h5><?php echo $post['title']?></h5>
                                        <span><?php echo date('F j, Y', strtotime($post['date'])) ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Categories</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <?php foreach ($categories  as $category) { ?>
                                <li><a href="category_post.php?status=category_post&&id=<?php echo $category['id']
                                    ?>">- <?php echo $category['name'] ?> </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>