<?php
    if (isset($_GET['status'])){
        if (isset($_GET['status']) == 'post_details'){
            $id = $_GET['id'];
            $post = $blog->post_details($id);
        }
    }

?>

<div class="col-lg-8">
    <div class="all-blog-posts">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="admin/uploads/post/<?php echo $post['image'] ?>" alt="">
                    </div>
                    <div class="down-content">
                        <span><?php echo $post['name'] ?></span>
                        <h4><?php echo $post['title'] ?></h4>
                        <ul class="post-info">
                            <li><a href="#"><?php echo $post['author'] ?></a></li>
                            <li><a href="#"><?php echo date('F j, Y', strtotime($post['date'])) ?></a></li>
                            <li><a href="#"><?php echo $post['comment'] ?> Comments</a></li>
                        </ul>
                        <p><?php echo $post['description'] ?></p>
                        <div class="post-options">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        <li><a href="#">Best Templates</a>,</li>
                                        <li><a href="#">TemplateMo</a></li>
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
            <div class="col-lg-12">
                <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                        <h2>Your comment</h2>
                    </div>
                    <div class="content">
                        <form id="comment" action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" placeholder="Your email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="subject" type="text" id="subject" placeholder="Subject">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Submit</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>