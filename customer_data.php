<?php

require "includes/db_connect.php";
require "includes/get_article_id.php";

// connect to the database server
$conn = connectDB();

// This gets the id from the browser tab when the save button was clicked in the new article page
if (isset($_GET['id'])){

    // Reading from the database to get specific article row by their id
    $article = getCustomerData($conn, $_GET['id']); // this holds an associative array
    
} else {
    // no error message printed when there's no id included in the url link
    $article = null; 
}
?>

<?php require "includes/header.php"; ?>

    <h1 align="center"><a href="http://localhost/lexispress_cms-app/index.php" style="text-decoration: none">-- LexisPress --</a></h1>

    <?php if ($article !== null): ?>

        <article>
            <h2><?php echo htmlspecialchars($article["title"]) ?></h2> 
            <p><?php echo htmlspecialchars($article["content"]) ?></p>
            <p><?php echo $article["date_published"]?></p>
        </article>

        <a href="edit_article.php?id=<?= $article['id']; ?>">Edit</a>

        <form method= "POST" action="delete_article.php?id=<?= $article['id']; ?>">
            <button type="submit" name="delete">Delete</button>
        </form>
        
     
    <?php else: ?>
        <p>No articles found.</p>
    <?php endif; ?>

<?php require "includes/footer.php"; ?>
