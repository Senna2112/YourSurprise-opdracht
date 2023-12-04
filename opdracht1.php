<?php
$url = 'https://jsonplaceholder.typicode.com/posts?userId=8';
$response = file_get_contents($url);
$posts = json_decode($response, true);

foreach ($posts as $post) {
    echo "Title: {$post['title']}\n";
    echo "Body: {$post['body']}\n\n";
}
?>
