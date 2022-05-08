<style>
    ul {
        list-style-type: none;
    }
</style>

<h2>Todo List:</h2>
<ul>
    <?php foreach ($todo as $key => $value) { ?>
        <li class="d-flex flex-row mb-1">
            <button type="button" class="btn btn-outline-danger btn-sm delete" value="<?php echo $value['id'] ?>">
                <i class=" bi bi-trash"></i>
            </button>
            <div class="form-check d-flex align-items-center mx-2">
                <div>
                    <input class="form-check-input checkbox" <?php if ($value['status']) echo "checked" ?> type="checkbox" value="<?php echo $value['id'] ?>" id="check_<?php echo $value['id'] ?>">
                    <label class="form-check-label" for="flexCheckDefault">
                        <a href="/?<?php echo "id={$value['id']}" ?>">
                            <?php echo $value['task'] ?>
                        </a>
                    </label>
                </div>
            </div>
        </li>
    <?php } ?>
</ul>

<script>
    $(document).ready(function() {
        $(".checkbox").change(function() {
            id = $(this).val();
            $.post("/", {
                id
            });
        })
        $(".delete").on("click", function() {
            id = $(this).val();
            that = this;
            $.post("/delete", {
                id
            }).done(function() {
                $(that).parent().remove();
            });
        })
    });
</script>