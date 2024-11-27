<?php
require_once 'entities/conection.class.php';
require_once 'repository/imagenGaleriaRepository.class.php';
require_once 'repository/categoriaRepository.class.php';

$imagenRepository = new ImagenGaleriaRepository();
$categoriaRepository = new CategoriaRepository();

$imagenes = $imagenRepository->findAll();
$categorias = $categoriaRepository->findAll();


shuffle($imagenes);

for ($i = 0; $i < count($imagenes); $i++): ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="sol">
            <img class="img-responsive" src="<?= $imagenes[$i]->getUrlPortfolio() ?>" alt="<?= $imagenes[$i]->getDescripcion() ?>">
            <div class="behind">
                <div class="head text-center">
                    <ul class="list-inline">
                        <li>
                            <a class="gallery" href="<?= $imagenes[$i]->getUrlPortfolio() ?>" data-toggle="tooltip" data-original-title="Quick View">
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
                        <li><i class="fa fa-eye"></i><?= $imagenes[$i]->getNumVisualizaciones() ?></li>
                        <li><i class="fa fa-heart"></i><?= $imagenes[$i]->getNumLikes() ?></li>
                        <li><i class="fa fa-download"></i><?= $imagenes[$i]->getNumDescargas() ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>
