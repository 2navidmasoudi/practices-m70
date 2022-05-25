<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $doctor->firstname . " " . $doctor->lastname ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo findObjectById($doctor->unit_id, $units)->name ?? 'بخش مشخص نشده' ?></h6>
        <p class="card-text">Address: <?php echo $doctor->address ?></p>
        <p class="card-text">Phone: <?php echo $doctor->phone ?></p>
        <p class="card-text">Twitter: <?php echo $doctor->twitter ?></p>
        <p class="card-text">Blog: <?php echo $doctor->blog ?></p>
        <p class="card-text">Instagram: <?php echo $doctor->instagram ?></p>
        <p class="card-text">Visit price: <?php echo $doctor->visit_price ?></p>
        <h6 class="card-text">Working hours:<?php if (empty($works)) echo "Not available right now..." ?></h6>
        <?php foreach ($works as $work) { ?>
            <p>
                <?php
                echo $work->day
                    . " "
                    .
                    date("H:i", strtotime($work->from_hour))
                    . " -> "
                    . date("H:i", strtotime($work->to_hour))
                ?>
            </p>
        <?php } ?>
        <a href="/" class="card-link">Home</a>
    </div>
</div>