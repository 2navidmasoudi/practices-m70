<div class="row rlt">
    <div class="col">
        <div class="input-group mb-3">
            <span class="input-group-text" id="name">نام دکتر</span>
            <input type="text" class="form-control" id="search" value="<?php echo $search ?>" onchange="getsearch(this);">
            <button class="btn btn-primary" type="button" id="search" onclick="submit()">جستجو</button>

        </div>
    </div>
    <div class="col">
        <select class="form-select mb-3" id="unit" onchange="getval(this);">
            <option <?php if (!$unit_id) echo "selected" ?> value="0">همه بخش ها</option>
            <!-- <option value="0">همه</option> -->
            <?php foreach ($units as $unit) { ?>
                <option value="<?php echo $unit->id ?>" <?php if ($unit_id == $unit->id) echo "selected" ?>><?php echo $unit->name ?></option>
            <?php } ?>
        </select>
    </div>
</div>

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

<script>
    unit_id = document.getElementById('unit').value;
    search = document.getElementById('search').value;

    function submit() {
        var form = $(
            '<form action="/" method="post">' +
            '<input type="text" name="unit_id" value="' + unit_id + '" />' +
            '<input type="text" name="search" value="' + search + '" />' +
            '</form>'
        );
        $('body').append(form);
        form.submit();
    }

    $(function() {
        $('#search').focus();
    })

    function getval(sel) {
        unit_id = sel.value;
        var form = $(
            '<form action="/" method="post">' +
            '<input type="text" name="unit_id" value="' + unit_id + '" />' +
            '<input type="text" name="search" value="' + search + '" />' +
            '</form>'
        );
        $('body').append(form);
        form.submit();
    }

    function getsearch(inp) {
        search = inp.value;
        var form = $(
            '<form action="/" method="post">' +
            '<input type="text" name="unit_id" value="' + unit_id + '" />' +
            '<input type="text" name="search" value="' + search + '" />' +
            '</form>'
        );
        $('body').append(form);
        form.submit();
    }
</script>