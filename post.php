 <?php
 include 'partials/header.php';

 //fetch post from database if id is set
 if(isset($_GET['id'])) {
    $id =filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);

 } else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
 }
 ?>
    <section class="singlepost">
        <div class="container singlepost__container">
           <h2><?= $post['title'] ?></h2>
           <div class="post__author">
                <?php
                // fetch author from users table using author_id
                $author_id = $post['author_id'];
                $author_query = "SELECT * FROM users WHERE id=$author_id";
                $author_result = mysqli_query($connection, $author_query);
                $author = mysqli_fetch_assoc($author_result);

                ?>
                <div class="post__author-avatar">
                    <img src="./images/<?= $author['avatar'] ?>">
                </div>
                <div class="post__author-info">
                    <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                    <small>
                        <?= date("M d, Y - H:i", strtotime($post['date_time']) ) ?>

                    </small>
                </div>
            </div>
        <div class="singlepost__thumbnail">
            <img src="./images/<?= $post['thumbnail']?>">
        </div>
        
        <p><?= $post['body']?>

      
    
    
    </p>
    <?php


// get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>

    
        <h2>Add comment</h2>
        <?php if(isset($_SESSION['add-category']) ) : ?>
            <div class="alert__message error">
            <p><?= $_SESSION['add-category'];
            unset($_SESSION['add-category']) ?>
            
            </p>
        </div>

            <?php endif?>
        <form method="POST" action="<?= ROOT_URL ?>comment.php">
            <input type="hidden" name="title" value="<?= $title ?>" placeholder="Title">
            <textarea placeholder="comments"  cols="30" name="description" rows="10"><?= $description ?></textarea>
           
            <button type="submit" name="submit" class="btn"> comment</button>
        </form>
    

    </div>
    

    </section>


            <!-- END OF single__posts ====================-->
            <footer>
                <div class="footer__socials">
                    <a href="https://youtube.com" target="_blank"><i class="fa fa-youtube"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                </div>
                <div class="container footer-container">
                    <article>
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="">Art</a></li>
                            <li><a href="">Wild Life</a></li>
                            <li><a href="">Travel</a></li>
                            <li><a href="">Music</a></li>
                            <li><a href="">Science and Technology</a></li>
                            <li><a href="">Food</a></li>
                            

                        </ul>
                    </article>
                    <article>
                        <h4> Support</h4>
                        <ul>
                            <li><a href="">Online support</a></li>
                            <li><a href="">call Numbers</a></li>
                            <li><a href="">Emails</a></li>
                            <li><a href="">Social Support</a></li>
                            <li><a href="">Location</a></li>
                            <li><a href="">Food</a></li>
                            

                        </ul>
                    </article>
                    <article>
                        <h4>Blog</h4>
                        <ul>
                            <li><a href="">Safety</a></li>
                            <li><a href="">Repair</a></li>
                            <li><a href="">Recent</a></li>
                            <li><a href="">Popular</a></li>
                            <li><a href="">categories</a></li>
                            
                            

                        </ul>
                    </article>
                    <article>
                        <h4>Permalinks</h4>
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Music</a></li>
                            <li><a href="">Services</a></li>
                            <li><a href="">Contact</a></li>
                            

                        </ul>
                    </article>
    
                </div>
                <div class="footer__copyright">
                        <small>Copyright & copy; MUKHTAR</small>
                </div>
            </footer>


      <script src="./main.js"></script>  
</body> 
</html>