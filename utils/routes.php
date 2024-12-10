<?php

    $router->get('','controllers/index.php');
    $router->get('about','controllers/about.php');
    $router->get('asociado','controllers/asociado.php');
    $router->get('blog', 'controllers/blog.php');
    $router->get('contact', 'controllers/contact.php');
    $router->get('imagenes-galeria', 'controllers/gallery.php');
    $router->get('post', 'controllers/single_post.php');
    $router->post('imagenes-galeria/nueva','controllers/nueva-imagen-galeria.php');
?>