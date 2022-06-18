<?php
    include("code.php");
    $blog = new BlogCode();
    $id = $_SESSION['admin_id'];
    $name = $_SESSION['admin_name'];
    $email = $_SESSION['admin_email'];

    if ($id==null && $name==null && $email==null ){
        header('Location: login.php');
    }
    //logout
    if (isset($_GET['status'])){
        if ($_GET['status'] == 'logout'){
            $blog->logout();
        }
    }

?>


<?php include_once ('includes/header.php') ?>

<?php include_once ('includes/navbar.php') ?>

<div id="layoutSidenav">
    <?php include_once ('includes/sidebar.php') ?>

    <div id="layoutSidenav_content">
        <main>
            <?php
                if (isset($view)){
                    if ($view == "dashboard"){
                        include("views/dashboard_view.php");
                    }elseif ($view == "category"){
                        include("views/category/category_view.php");
                    }elseif ($view == 'category_create'){
                        include("views/category/category_create.php");
                    }elseif ($view == 'category_edit'){
                        include("views/category/category_edit.php");
                    }elseif($view == 'post'){
                        include('views/post/post_view.php');
                    }elseif($view == 'post_create'){
                        include('views/post/post_create.php');
                    }elseif($view == 'edit_image'){
                        include('views/post/edit_image_view.php');
                    }elseif($view == 'post_edit'){
                        include('views/post/post_edit.php');
                    }
                }
            ?>
        </main>

<?php include_once('includes/footer.php') ?>

