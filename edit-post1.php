<?php
include 'partials/header.php';
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    // fetc hcomments from database
    $query = "SELECT * FROM comments1 WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
 
}else {
    header('location: ' .ROOT_URL . 'post1.php');
    die();
}
?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit comments</h2>
        <div class="alert__message error">
            <p>this is an error message</p>
        </div>
        <form action="<?= ROOT_URL ?>edit-post1-logic.php" method="post" >
            <input type="hidden"  name="id" value="<?= $category['id']?>">
            <input type="hidden"  name="title" value="<?= $category['title']?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?= $category['description']?></textarea>
            <button type="submit" name="submit" class="btn">Update comments</button>
        </form>
    </div> 
</section>
<?php
include '../partials/footer.php';
?>