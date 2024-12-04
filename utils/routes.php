<?php

$router->get('','app/controllers/index.php');
$router->get('about','app/controllers/about.php');
$router->get('asociados','app/controllers/asociados.php');
$router->get('blog','app/controllers/blog.php');
$router->get('contact','app/controllers/contact.php');
$router->get('gallery','app/controllers/gallery.php');
$router->get('post','app/controllers/single_post.php');
$router->post('gallery/new', 'app/controllers/single_post.php');


?>