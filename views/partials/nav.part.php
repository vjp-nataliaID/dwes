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
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>[PHOTO]</span>
            </a>
         </div>
         <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
              <li class="<?php echo esOpcionMenuActiva("/index.php") ? "active" : ""?> lien">
                <a href="<?php echo esOpcionMenuActiva("/index.php") ? "#" : "index.php"?>">
                <i class="fa fa-home sr-icons"></i> Home
                </a>
              </li>

              <li class="<?php echo esOpcionMenuActiva('/about.php') ? "active" : ""?> lien">
                <a href="<?php echo esOpcionMenuActiva('/about.php') ? "#" : "about.php"?> lien">
                  <i class="fa fa-bookmark sr-icons"></i> About
                </a>
              </li>
              <li class="<?php echo esOpcionMenuActiva('blog.php') ? "active" : ""?> lien">
                <a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
              <li>
                <a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
            </ul>
         </div>
     </div>
   </nav>
  
   <?php
    require __DIR__.'../../../utils/utils.php';
      esOpcionMenuActiva(){

      }
   ?>
<!-- End of Navigation Bar -->