<?php
    session_start();

    class BlogCode{
        private $connection;

        public function __construct(){
            $this->db_connect();

        }

        public function db_connect(){
            $db_host = "localhost";
            $db_user = "root";
            $db_password = "";
            $db_name = "php_blog";

            $this->connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

            if (!$this->connection){
                echo "Connection failed". mysqli_connect_error();
            }
        }

        //login functionality
        public function admin_login($data){
            $email = mysqli_real_escape_string($this->connection,$data['email']);
            $password = mysqli_real_escape_string($this->connection,md5($data['password']));

            $query = "SELECT * FROM user WHERE email='$email' && password='$password'";

            $query_run = mysqli_query($this->connection, $query);

            if ($query_run){
                $user = mysqli_fetch_assoc($query_run);
                if ($user){
                    header('Location: dashboard.php');
                    $_SESSION['admin_id'] = $user['id'];
                    $_SESSION['admin_name'] = $user['name'];
                    $_SESSION['admin_email'] = $user['email'];
                }else{
                    return "Email Or Password doesn't match";
                }

            }

        }
        //admin logout
        public function logout(){
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_name']);
            unset($_SESSION['admin_email']);
            header('Location: login.php');
        }

        //add category
        public function add_category($data){
            $name = mysqli_real_escape_string($this->connection, $data['name']);
            $description = mysqli_real_escape_string($this->connection, $data['description']);

            $query = "INSERT INTO category (name, description) VALUES ('$name','$description')";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                header('location: category_view.php');
                return "Category Inserted successfully";

            }else{
                return "Category not Inserted successfully";
            }
        }
        //view category
        public function view_category(){
            $query = "SELECT * FROM category ORDER BY id DESC ";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                return $query_run;
            }
        }
        //edit category
        public function edit_category($id){
            $query = "SELECT * FROM category WHERE id='$id'";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                $data = mysqli_fetch_assoc($query_run);
                return $data;
            }
        }

        //update category
        public function update_category($data){
            $name = mysqli_real_escape_string($this->connection, $data['name']);
            $description = mysqli_real_escape_string($this->connection, $data['description']);
            $id = mysqli_real_escape_string($this->connection, $data['category_id']);

            $query = "UPDATE category SET name='$name', description='$description' WHERE id='$id'";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                header('location: category_view.php');
                return "Category Updated successfully";
            }else{
                return "Category not Updated successfully";
            }
        }

        //delete category
        public function delete_category($id){
            $query = "DELETE FROM category WHERE id='$id'";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                header('location: category_view.php');
                return "Category deleted successfully";
            }else{
                header('location: category_view.php');
                return "Category not deleted successfully";
            }

        }

        //add post
        public function add_post($data){
            $category_id = mysqli_real_escape_string($this->connection, $data['category_id']);
            $title = mysqli_real_escape_string($this->connection, $data['title']);
            $description = mysqli_real_escape_string($this->connection, $data['description']);
            $tag = mysqli_real_escape_string($this->connection, $data['tag']);
            $status = mysqli_real_escape_string($this->connection, $data['status']);
            $image_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $query = "INSERT INTO posts (title,description,category_id,image,author,comment,tag,status,date) 
                    VALUES ('$title','$description',$category_id,'$image_name','admin', 5,'$tag',$status,now())";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                header('location: post_view.php');
                move_uploaded_file($tmp_name, 'uploads/post/'.$image_name);
                return "Post created successfully";
            }else{
                return "Post not created successfully";
            }

        }
        //show post
        public function view_post(){
            $query = "SELECT * FROM post_category ORDER BY id DESC";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                return $query_run;
            }
        }
        //edit post
        public function edit_post($id){
            $query = "SELECT * FROM posts WHERE id='$id'";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                $data = mysqli_fetch_assoc($query_run);
                return $data;
            }
        }
        public function update_post($data){
            $category_id = mysqli_real_escape_string($this->connection, $data['category_id']);
            $title = mysqli_real_escape_string($this->connection, $data['title']);
            $description = mysqli_real_escape_string($this->connection, $data['description']);
            $tag = mysqli_real_escape_string($this->connection, $data['tag']);
            $status = mysqli_real_escape_string($this->connection, $data['status']);
            $id = $data['post_id'];
            $query = "UPDATE posts SET title='$title',description='$description',category_id=$category_id,author='admin',
            comment=5,tag='$tag',status=$status,date=now() WHERE id=$id";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                header('location: post_view.php');
                return "Post Updated successfully";
            }else{
                return "Post not Updated successfully";
            }
        }
        //update image
        public function update_image($data){
            $id = $data['post_image_id'];
            $image_name = $_FILES['post_image']['name'];
            $temp_name = $_FILES['post_image']['tmp_name'];
            //old image retrieve
            $data = "SELECT * FROM posts WHERE id=$id";
            $result = mysqli_query($this->connection, $data);
            $post = mysqli_fetch_assoc($result);
            $image = $post['image'];

            $query = "UPDATE posts SET image='$image_name' WHERE id=$id ";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                if(file_exists('uploads/post/'.$image)){
                    unlink('uploads/post/'.$image);
                }
                move_uploaded_file($temp_name, "uploads/post/".$image_name);
                header("Location: post_view.php");
                exit();
            }


        }
        //delete post
        public function delete_post($id){
            $query = "SELECT * FROM posts WHERE id='$id'";
            $query_run = mysqli_query($this->connection, $query);
            $post = mysqli_fetch_assoc($query_run);
            $post_image = $post['image'];

            $query = "DELETE FROM posts WHERE id=$id";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                if(file_exists('uploads/post/'.$post_image)){
                    unlink('uploads/post/'.$post_image);
                }
                header('location: post_view.php');
            }
        }




        // frontend code

        //Home page
        public function display_post_home(){
            $query = "SELECT * FROM post_category Where status=1 ORDER BY id DESC LIMIT 3";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                return $query_run;
            }
        }

        public function post_details($id){
            $query = "SELECT * FROM post_category WHERE id=$id";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                $single_post = mysqli_fetch_assoc($query_run);
                return $single_post;
            }
        }

        public function blog_post(){
            $query = "SELECT * FROM post_category ORDER BY id DESC";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                return $query_run;
            }
        }
        public function recent_post(){
            $query = "SELECT * FROM post_category ORDER BY id DESC LIMIT 3";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                return $query_run;
            }
        }
        public function post_by_category($id){
            $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY id DESC";
            $query_run = mysqli_query($this->connection, $query);
            if ($query_run){
                return $query_run;
            }
        }
        public function search_post($data){
            $query = htmlspecialchars($data);
            $query = mysqli_real_escape_string($this->connection, $query);

            $sql = "SELECT * FROM posts WHERE title LIKE '%$query%'";
            $sql_run = mysqli_query($this->connection, $sql);
            if ($sql_run){
                return $sql_run;
            }

        }
    }




?>

