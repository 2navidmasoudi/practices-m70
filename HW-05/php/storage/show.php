<?php

function show_storage($storage)
{ ?>
    <div class="accordion rounded-1">
        <?php foreach ($storage as $key => $folder) { ?>
            <?php if (!isset($folder['size'])) { ?>
                <div class="accordion-item rounded-0">
                    <?php $idgenerator = rand_str(7) ?>
                    <h2 class="accordion-header" id="heading-<?php echo $idgenerator ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#folder-<?php echo $idgenerator ?>">
                            <i class="bi bi-folder-fill me-2"></i> <?php echo $key ?>
                        </button>
                    </h2>
                    <div id="folder-<?php echo $idgenerator ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <?php foreach ($folder as $sub_key => $file) { ?>
                                <?php if (isset($file['size'])) { ?>
                                    <li class="list-group-item">
                                        <?php echo $file['name'] . " ({$file['size']} byets)" ?>
                                    </li>
                                <?php } else { ?>
                                    <?php show_storage([$sub_key => $file]) ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <li class="list-group-item">
                    <?php echo $folder['name'] . " ({$folder['size']} bytes)" ?>
                </li>
            <?php } ?>
        <?php } ?>
    </div>
<?php
}
