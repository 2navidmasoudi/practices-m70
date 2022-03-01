<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Drive</title>
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">
</head>

<?php

include $_SERVER['DOCUMENT_ROOT'] . "/php/variable.php";
include "$root/php/user/info.php";
include "$root/php/directory/get.php";
include "$root/php/storage/get.php";
include "$root/php/storage/show.php";
include "$root/php/storage/rename.php";
include "$root/php/storage/delete.php";
include "$root/php/storage/upload.php";
include "$root/php/storage/move.php";
include_once "$root/php/function.php";
include_once "$root/php/components/toast.php";

$token = $_GET['token'] ?? 'c7192cc967da3f6a772c2c0cb64e1994';

// check if the token is valid and return user information.
$user = user_info($token);

// get the directory from token, if not exist makes one.
$directory = get_directory($token);

// storage is basiclly everything user makes or uploads.
$storage = get_storage($directory);

?>

<body class="bg-dark-moon text-light">

    <!-- toast component for showing the result -->
    <?php show_toast("Created by 2navidmasoudi@gmail.com", 'info') ?>

    <main class="container">

        <h1 class="text-center my-5">Hello <?php echo ucwords($user['name']) ?>, Welcome to <span class="text-gradient">Drive!</span></h1>

        <!-- add button -->
        <div class="my-3">
            <div class="dropdown dropend">
                <button class="btn btn-dark-blue pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="me-1">Add</span>
                    <i class="bi bi-plus ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Add"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark p-0 ms-2 bg-transparent border-0">
                    <!-- Create New Folder Button -->
                    <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#modal-new-folder">
                        <i class="bi bi-folder-plus ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="create folder"></i>
                        New Folder
                    </button>
                    <!-- Upload to Folder Button -->
                    <button class="btn btn-info ms-1" data-bs-toggle="modal" type="button" data-bs-target="#modal-upload-file">
                        <i class="bi bi-cloud-upload ps-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="upload files"></i>
                        Upload files
                    </button>
                </ul>
            </div>

            <!-- Upload files to folder modal -->
            <div class="modal fade" id="modal-upload-file">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark text-light">
                        <form action="" method="post" multipart="" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload files</h5>
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
                                <button type="submit" class="btn btn-success" name="upload" value="<?php echo "$root/storage/$directory" ?>">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- New folder modal -->
            <div class="modal fade" id="modal-new-folder">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark text-light">
                        <form action="" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">New folder</h5>
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
                                <button type="submit" class="btn btn-success" name="new_folder" value="<?php echo "$root/storage/$directory" ?>">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section>

            <!-- show everything in storage -->
            <?php if (count($storage) > 0) { ?>
                <?php show_storage($storage); ?>
            <?php } else { ?>
                <div class="mt-2">
                    <div class="w-100 border border-info rounded-3 bg-light text-primary text-center py-3">
                        Your drive is empty.
                    </div>
                </div>
            <?php } ?>
            <!-- size of all storage -->
            <?php $size = get_folder_size($storage) ?>
            <?php if ($size > 0) { ?>
                <div class="mt-2">
                    <?php echo "Your drive size is $size bytes" . formatSizeUnits($size) ?>
                </div>
            <?php } ?>

        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        var toastLiveExample = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    </script>
</body>

</html>