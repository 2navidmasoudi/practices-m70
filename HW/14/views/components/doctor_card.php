<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $doctor->firstname . " " . $doctor->lastname ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo findObjectById($doctor->unit_id, $units)->name ?? 'بخش مشخص نشده' ?></h6>
        <p class="card-text">address: <?php echo $doctor->address ?></p>
        <a href="/doctor/<?php echo $doctor->id ?>" class="card-link">details</a>
    </div>
</div>