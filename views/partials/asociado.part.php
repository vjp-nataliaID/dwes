<!-- Box within partners name and logo -->
<div class="last-box row">
    <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
            <p>
                <i class="fa fa-map-marker fa-2x sr-icons"></i>
                <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
            </p>
            <h4>Our Main Partners</h4>
            <hr>
            <div class="text-muted text-left">
                <?php foreach ($asociadosAMostrar as $asociado): ?>
                    <ul class="list-inline">
                        <!-- Muestra el logo del asociado -->
                        <li>
                            <img src="images/asociados/<?= htmlspecialchars($asociado->getLogo()) ?>" alt="<?= htmlspecialchars($asociado->getDescripcion()) ?>" title="<?= htmlspecialchars($asociado->getDescripcion()) ?>" width="100px">
                        </li>
                      
                        <li>
                            <?= htmlspecialchars($asociado->getNombre()) ?>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Box within partners name and logo -->
