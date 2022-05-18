<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $doctor->firstname . " " . $doctor->lastname ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $doctor->unit_id ?></h6>
        <p class="card-text">آدرس: <?php echo $doctor->address ?></p>
        <a href="/doctor/<?php echo $doctor->id ?>" class="card-link">مشخصات</a>
    </div>
</div>