<?php
$databaseFile = 'db/blog_site.db';

try {
    $pdo = new PDO("sqlite:$databaseFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT blog_posts.*
            FROM blog_posts
            JOIN likes ON blog_posts.blog_id = likes.blog_id
            WHERE likes.user_id = 8";


    $result = $pdo->query($sql);

    if ($result) {
        $posts = $result->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($posts)) {
            foreach ($posts as $post) {
                echo "Blog ID: " . $post["blog_id"] . "<br>";
                echo "User ID: " . $post["user_id"] . "<br>";
                echo "Post: " . $post["post"] . "<br><br>";
            }
        } else {
            echo "No results found for user.";
        }
    } else {
        echo "Query failed.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $pdo = null;
}
?>
