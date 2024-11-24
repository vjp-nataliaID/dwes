<?php
  include __DIR__.'/partials/inicio-doc.part.php'
  ?>

<?php
  include __DIR__.'/partials/nav.part.php';
  ?>

<!-- Principal Content Start -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>CONTACT US</h1>
       	   <hr>
       	   <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
			  <?php if (!empty($fallos)) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($fallos as $fallo) : ?>
                            <li><?= $fallo ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
			<?php if (isset($success_message)) : ?>
                <div class="alert alert-info">
                    <?= $success_message ?>
                </div>
            <?php endif; ?>
		
		
			

			</div>
	    
		   <form action="<?=$_SERVER['PHP_SELF']?>" class="form-horizontal" method="post">
	       	  <div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label for="nombre" class="label-control">Nombre</label>
	       	  		<input name="nombre" class="form-control" type="text">
	       	  	</div>
	       	  	<div class="col-xs-6">
	       	  	    <label for="apellido" class="label-control">Apellido</label>
	       	  		<input name="apellido" class="form-control" type="text">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label for="email" class="label-control">Email</label>
	       	  		<input name="email" class="form-control" type="email">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label for="sujeto" class="label-control">Sujeto</label>
	       	  		<input name="sujeto" class="form-control" type="text">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label for="mensaje" class="label-control">Mensaje</label>
	       	  		<textarea name="mensaje" class="form-control"></textarea>
	       	  		<button class="pull-right btn btn-lg sr-button">ENVIAR</button>
	       	  	</div>
	       	  </div>
		</form>
	       <hr class="divider">
	       <div class="address">
	           <h3>GET IN TOUCH</h3>
	           <hr>
	           <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

<?php include __DIR__.'/partials/fin-doc.part.php'?>