<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
    // get updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // check for valid users
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Invalid form data on edit user";
    } else {
        // update user
        $query = " UPDATE users set firstname = '$firstname', lastname = '$lastname', is_admin= $is_admin wHerE id=$id limit 1 ";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = 'Failed to update user.';
        } else {
            $_SESSION["edit-user-success"] = "User $firstname $lastname successfully.";
        }

            
        }


    } 
    header('location: ' . ROOT_URL . 'admin/manage-users.php');
    die();
        
        