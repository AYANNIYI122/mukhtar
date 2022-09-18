<?php
require 'config/constants.php';

//get back form data if there was registration error
$firstname =$_SESSION['signup-data']['firstname'] ?? null;
$lastname =$_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username']?? null ;
$email = $_SESSION['signup-data']['email'] ?? null ; 
$createpassword =$_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword =$_SESSION['signup-data']['confirmpassword'] ?? null;

//delete signup session_abort
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="<?=ROOT_URL?>css/style.css">
    <!-- GOOGLE FONT-MONTSERRAT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800;900&family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
       <?php
       if (isset($_SESSION['signup'])) :?>
      <div class="alert__message error">
        <p>
            <?= $_SESSION['signup'];
             unset($_SESSION['signup']);
            ?> 
        </p>
        </div>
       <?php endif ?>
       
        <form action="<?=ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST" >
            <input type="text" value="<?=$firstname?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?=$lastname?>" name="lastname" placeholder="Last Name">
            <input type="text" value="<?=$username?>" name="username" placeholder="Username ">
            <input type="email" value="<?=$email?>" name="  email" placeholder="Email">
            <input type="password" value="<?= $createpassword ?>" name="createpassword" placeholder="Create Password">
            <input type="password" value="<?= $confirmpassword ?>" name="confirmpassword" placeholder="Confirm Password">
            <div class="form__control"> 
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="signin.php" > Sign In</a></small>

        </form>
    </div> 
</section>


 
    
</body>
</html>