<?php

function show_file($file)
{ ?>
    <li class="list-group-item" href="<?php echo $file['relative'] ?>" target="_blank">

        <?php $file_idgenerator = rand_str(7) ?>

        <div class="row">
            <div class="col d-flex align-items-center">
                <i class="bi bi-filetype-<?php echo $file['ext'] ?> me-1"></i>
                <?php echo $file['name'] . " ({$file['size']} bytes)" ?>
            </div>
            <div class="col ms-auto d-flex justify-content-end">
                <form action="" method="post">
                    <div class="btn-group">

                        <!-- Preview file in new tab -->
                        <a class="btn btn-success" href="<?php echo $file['relative'] ?>" role="button" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="preview">
                            <i class="bi bi-eye ps-auto"></i>
                        </a>

                        <!-- Download file -->
                        <a class="btn btn-info" href="<?php echo $file['relative'] ?>" role="button" download data-bs-toggle="tooltip" data-bs-placement="top" title="download">
                            <i class="bi bi-download ps-auto"></i>
                        </a>
                        <!-- Rename file -->

                        <button class="btn btn-warning" role="button" data-bs-toggle="modal" type="button" data-bs-target="#modal-rename-file-<?php echo $file_idgenerator ?>">
                            <i class="bi bi-pencil-square ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="rename file"></i>
                        </button>
                        <!-- Delete file -->
                        <button class="btn btn-danger" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="delete" type="submit" name="delete" value="<?php echo $file['path'] ?>">
                            <i class="bi bi-trash ps-auto"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Rename file modal -->
            <div class="modal fade" id="modal-rename-file-<?php echo $file_idgenerator ?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark text-light">
                        <form action="" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Rename file of <?php echo $file['name']; ?></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="col-form-label">Rename file:</label>
                                    <input type="text" class="form-control" id="name" name="rename_file_name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="rename_file" value="<?php echo $file['path'] ?>">Rename</button>
                            </div>
                        </form>
                    </div>
                </div>
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

                    <?php $idgenerator = rand_str(7); ?>
                    <?php $folder_size = get_folder_size([$folder]); ?>

                    <h2 class="accordion-header" id="heading-<?php echo $idgenerator ?>">

                        <div class="row w-100 m-0 g-0">
                            <div class="col">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#folder-<?php echo $idgenerator ?>">
                                    <i class="bi bi-folder-fill me-2"></i>
                                    <?php echo basename($key) . " (" . $folder_size . " bytes)" ?>
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
                                        <button class="btn btn-info" data-bs-toggle="modal" type="button" data-bs-target="#modal-upload-file-<?php echo $idgenerator ?>">
                                            <i class="bi bi-cloud-upload ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="upload file"></i>
                                        </button>

                                        <!-- Rename Folder Button -->
                                        <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#modal-rename-folder-<?php echo $idgenerator ?>">
                                            <i class="bi bi-pencil-square ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="rename folder"></i>
                                        </button>

                                        <!-- Delete Folder Button -->
                                        <?php if ($folder_size) { ?>
                                            <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#modal-delete-folder-<?php echo $idgenerator ?>">
                                                <i class="bi bi-trash ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="delete folder"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="delete folder" type="submit" name="delete" value="<?php echo $key ?>">
                                                <i class="bi bi-trash ps-auto"></i>
                                            </button>
                                        <?php } ?>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </h2>

                    <!-- Upload files to folder modal -->
                    <div class="modal fade" id="modal-upload-file-<?php echo $idgenerator ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-light">
                                <form action="" method="post" multipart="" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Upload files to <?php echo basename($key); ?></h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group file-area">
                                            <label for="files" class="col-form-label">Choose or drag and drop here:</label>
                                            <input type="file" name="files[]" id="files" required="required" multiple="multiple" />
                                            <div class="file-dummy">
                                                <div class="success">Your files are selected, Click on Upload.</div>
                                                <div class="default">Please select some files</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="upload" value="<?php echo $key ?>">Upload</button>
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
                                            <label for="new_folder_name" class="col-form-label">Folder name:</label>
                                            <input type="text" class="form-control" id="new_folder_name" name="new_folder_name">
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

                    <!-- Delete folder modal -->
                    <div class="modal fade" id="modal-delete-folder-<?php echo $idgenerator ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-light">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete folder of <?php echo basename($key); ?></h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <p><span class="text-warning">Warning:</span> Your folder contains some files!</p>
                                            <p>Do you want to <span class="text-danger">delete everyting</span> ?</p>
                                            <p>or do you want to <span class="text-success">move subfolders to parent folder</span> ?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="move" value="<?php echo $key ?>">Move Subfolders</button>
                                        <button type="submit" class="btn btn-danger" name="delete" value="<?php echo $key ?>">Delete All</button>
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
                                    No files here... add with <i class="bi bi-cloud-upload"></i> button.
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
