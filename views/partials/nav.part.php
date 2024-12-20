<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">

        <li class="<?php echo esOpcionMenuActiva('index.php') ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva('index.php') ? "#" : "/" ?>">
            <i class="fa fa-home sr-icons"></i> Home</a>
        </li>
        <li class="<?php echo esOpcionMenuActiva('about.php') ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva('about.php') ? "#" : "/about" ?>">
            <i class="fa fa-bookmark sr-icons"></i> About
          </a>
        </li>
        <li class="<?php echo existeOpcionMenuActivaEnArray(['/blog.php', '/single_post.php']) ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva('blog.php') ? "#" : "/blog" ?>">
            <i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>
        <li class="<?php echo esOpcionMenuActiva('contact.php') ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva('contact.php') ? "#" : "/contact" ?>">
            <i class="fa fa-phone-square sr-icons"></i> Contact</a>
        </li>
        <li class="<?php echo esOpcionMenuActiva('imagenes-galeria') ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva('imagenes-galeria') ? "#" : "/imagenes-galeria" ?>">
            <i class="fa fa-image sr-icons"></i> Gallery</a>
        </li>
        <li class="<?php echo esOpcionMenuActiva('asociado.php') ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva('asociado.php') ? "#" : "/asociado" ?>">
            <i class="fa fa-hand-o-right"></i> Asociados</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- End of Navigation Bar -->