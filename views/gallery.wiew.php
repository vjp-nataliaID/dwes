<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>
<?php include __DIR__ . '/partials/nav.part.php';
require_once 'entities/imagenGaleria.class.php';
?>

<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALERIA</h1>
            <hr>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissibre" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Visualizaciones</th>
                            <th scope="col">Likes</th>
                            <th scope="col">Descargas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($imagenes) && is_array($imagenes)): ?>
                        <?php foreach ($imagenes as $img): ?>
                            <tr>
                                <th scope="row"><?= $img->getId()?></th>
                            <td>
                                <img src="<?= $img->getUrlGallery()?>"
                                 alt="<?= $img->getDescripcion() ?>"
                                 title="<?= $img->getDescripcion() ?>"
                                 width="100px">
                            </td>
                            <td><?= $img->getNumLikes()?> </td>
                            <td><?= $img->getNumVisualizaciones()?></td>
                            <td><?= $img->getNumDownloads()?></td>
                            </tr>

                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay imágenes disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>