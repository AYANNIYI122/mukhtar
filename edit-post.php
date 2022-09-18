<?php
include 'partials/header.php';

//fetch categories from database
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);


//fetch post data from database if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result); 
} else {
    header('location: '  . ROOT_URL . 'admin/');
    die();
}
?>
<section class="form__section">
<div class="container form__section-container">
        <h2>Edit post</h2>
        <div class="alert__message error">
            <p>this is an error message</p>
        </div>
        <form action="edit-post-logic.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumnail'] ?>" placeholder="Title">
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">
            <select name="category" >
                <?php while($category = mysqli_fetch_assoc($categories))  : ?>
                <option value="<?= $category['id'] ?>"><?= $category['title']?></option>
                <?php endwhile ?>
                
            </select>
            <textarea placeholder="Body" name="body" rows="10"><?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" checked>
                <label for="is__featured" >Featured</label>
            </div>
            <div class="form__control">
               
                 <label for="thumbnail" checked>Change Thumbnail</label> 
                 <input type="file" name="thumbnail" id="thumbnail">
               
            </div>
            
        

            
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div> 
</section>
<?php
include '../partials/footer.php';
?>