<?php

function show_file($folder)
{ ?>
    <li class="list-group-item" href="<?php echo $folder['relative'] ?>" target="_blank">
        <div class="row">
            <div class="col d-flex align-items-center">
                <i class="bi bi-filetype-<?php echo $folder['ext'] ?> me-1"></i>
                <?php echo $folder['name'] . " ({$folder['size']} bytes)" ?>
            </div>
            <div class="col ms-auto d-flex justify-content-end">
                <form action="" method="post">
                    <div class="btn-group">
                        <a class="btn btn-success" href="<?php echo $folder['relative'] ?>" role="button" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="preview">
                            <i class="bi bi-eye ps-auto"></i>
                        </a>
                        <a class="btn btn-info" href="<?php echo $folder['relative'] ?>" role="button" download data-bs-toggle="tooltip" data-bs-placement="top" title="download">
                            <i class="bi bi-download ps-auto"></i>
                        </a>
                        <button class="btn btn-danger" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="delete" type="submit" name="delete" value="<?php echo $folder['path'] ?>">
                            <i class="bi bi-trash ps-auto"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </li>
<?php
}

function show_storage($storage)
{ ?>
    <div class="accordion rounded-1">
        <?php foreach ($storage as $key => $folder) { ?>
            <?php if (!isset($folder['parent'])) { ?>
                <div class="accordion-item rounded-0">

                    <?php $idgenerator = rand_str(7) ?>

                    <h2 class="accordion-header" id="heading-<?php echo $idgenerator ?>">

                        <div class="row w-100 m-0 g-0">
                            <div class="col">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#folder-<?php echo $idgenerator ?>">
                                    <i class="bi bi-folder-fill me-2"></i>
                                    <?php echo basename($key) ?>
                                </button>
                            </div>
                            <div class="col-auto d-flex justify-content-center align-items-center px-3 delete-directory">
                                <form action="" method="post">
                                    <div class="btn-group">

                                        <!-- Create New Folder Button -->
                                        <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#modal-new-folder-<?php echo $idgenerator ?>">
                                            <i class="bi bi-folder-plus ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="create folder"></i>
                                        </button>

                                        <!-- Upload to Folder Button -->
                                        <button class="btn btn-info" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="upload" type="submit" name="upload" value="<?php echo $key ?>">
                                            <i class="bi bi-cloud-upload ps-auto"></i>
                                        </button>

                                        <!-- Rename Folder Button -->
                                        <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#modal-rename-folder-<?php echo $idgenerator ?>">
                                            <i class="bi bi-pencil-square ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="rename folder"></i>
                                        </button>

                                        <!-- Delete Folder Button -->
                                        <button class="btn btn-danger" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="delete folder" type="submit" name="delete" value="<?php echo $key ?>">
                                            <i class="bi bi-trash ps-auto"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </h2>

                    <!-- Rename folder modal -->
                    <div class="modal fade" id="modal-rename-folder-<?php echo $idgenerator ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-light">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Rename folder of <?php echo basename($key); ?></h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Rename Folder:</label>
                                            <input type="text" class="form-control" id="name" name="rename_folder_name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="rename_folder" value="<?php echo $key ?>">Rename</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- New folder modal -->
                    <div class="modal fade" id="modal-new-folder-<?php echo $idgenerator ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-light">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">New folder in <?php echo basename($key); ?></h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Folder name:</label>
                                            <input type="text" class="form-control" id="path" name="new_folder_name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="new_folder" value="<?php echo $key ?>">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- folder accordion -->
                    <div id="folder-<?php echo $idgenerator ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">

                            <?php if (isset($folder)) { ?>
                                <?php foreach ($folder as $sub_key => $file) { ?>
                                    <?php if (isset($file['parent'])) { ?>
                                        <?php show_file($file) ?>
                                    <?php } else { ?>
                                        <?php show_storage([$sub_key => $file]) ?>
                                    <?php } ?>
                                <?php }  ?>
                            <?php } else { ?>
                                <div class="alert alert-warning">
                                    No files here... add with + button.
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <?php show_file($folder); ?>
            <?php } ?>
        <?php } ?>
    </div>
<?php
}
