<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // validate input
    if (!$description) {
        $_SESSION['edit-comments'] = "invalid form input on edit comments page";
    } else {
        $query = "UPDATE comments SET   description = '$description' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-comments'] = "couldn'nt update comments";

        }else {
            $_SESSION['edit-comments-success'] = "comments $title was updated successfully";

        }
    }
}
header('location: ' . ROOT_URL . 'post1.php' );
die();