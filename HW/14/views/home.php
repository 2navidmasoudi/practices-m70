<h3>Welcome to Modern Hospital</h3>
<?php if (!empty($doctors)) : ?>
    <div class="row">
        <?php foreach ($doctors as $doctor) { ?>
            <div class="col-sm-4">
                <?php include __DIR__ . "/components/doctor_card.php"; ?>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>