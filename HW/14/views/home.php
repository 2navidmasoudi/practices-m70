<?php if (!empty($doctors)) : ?>
    <div class="row">
        <?php foreach ($doctors as $doctor) { ?>
            <div class="col-sm-4">
                <?php include __DIR__ . "/components/doctor_card.php"; ?>
            </div>
        <?php } ?>
    </div>
<?php else : ?>
    <h3>No doctors in this hospital :(</h3>
<?php endif; ?>