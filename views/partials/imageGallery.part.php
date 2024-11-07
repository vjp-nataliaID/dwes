   <?php
   shuffle($arrayImagenes);
   
   for ($i = 0; $i < count($arrayImagenes); $i++): ?>
       <div class="col-xs-12 col-sm-6 col-md-3">
           <div class="sol">
               <img class="img-responsive" src=<?= $arrayImagenes[$i]->getUrlPortfolio()?> alt=<?= $arrayImagenes[$i]->getDescripcion()?>>
               <div class="behind">
                   <div class="head text-center">
                       <ul class="list-inline">
                           <li>
                               <a class="gallery" href="<?= $arrayImagenes[$i]->getUrlPortfolio()?>" data-toggle="tooltip" data-original-title="Quick View">
                                   <i class="fa fa-eye"></i>
                               </a>
                           </li>
                           <li>
                               <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                                   <i class="fa fa-heart"></i>
                               </a>
                           </li>
                           <li>
                               <a href="#" data-toggle="tooltip" data-original-title="Download">
                                   <i class="fa fa-download"></i>
                               </a>
                           </li>
                           <li>
                               <a href="#" data-toggle="tooltip" data-original-title="More information">
                                   <i class="fa fa-info"></i>
                               </a>
                           </li>
                       </ul>
                   </div>
                   <div class="row box-content">
                       <ul class="list-inline text-center">
                           <li><i class="fa fa-eye"></i><?= $arrayImagenes[$i]->getNumVisualizaciones() ?></li>
                           <li><i class="fa fa-heart"></i><?= $arrayImagenes[$i]->getNumLikes() ?></li>
                           <li><i class="fa fa-download"></i><?= $arrayImagenes[$i]->getNumDescargas() ?></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   <?php endfor ?>
