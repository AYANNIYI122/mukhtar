<?php
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if (!$firstname) {
   $_SESSION['sign-up'] = "please enter your first name";
} elseif (!$username) {
    $_SESSION['sign-up'] = "please enter your username";
} elseif (strlen($pass)) {
    # code...
}     




}