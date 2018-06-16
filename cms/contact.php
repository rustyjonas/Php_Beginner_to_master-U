<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<?php

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){
        $username = mysqli_real_escape_string($connection,$username);
        $email    = mysqli_real_escape_string($connection,$email);
        $password = mysqli_real_escape_string($connection,$password);

        $password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 12) );


//        $query = "SELECT randSalt FROM users";
//        $select_randsalt_query = mysqli_query($connection, $query);
//        if(!$select_randsalt_query) {
//            die("Query Failed" . mysqli_error($connection));
//        }
//
//        $row = mysqli_fetch_array($select_randsalt_query);
//
//        $salt = $row['randSalt'];
//
//        $password = crypt($password, $salt);

        $query = "INSERT INTO users (username, user_password, user_email, user_role) VALUES ('{$username}','{$password}','{$email}','Subscriber')";
        $register_user_query = mysqli_query($connection,$query);
        if(!$register_user_query) {
            die("QUERY FAILED " . mysqli_error($connection));
        }

        $message = "Your Registration has been submitted";

    }else{

        $message = "Fields cannot be empty";
    }
} else{
    $message = '';
}




?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>