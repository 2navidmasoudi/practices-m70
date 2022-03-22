<?php
session_start();

if (!isset($_SESSION['user']['username'])) {
    session_destroy();
    header('location: /index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="output.css" rel="stylesheet">
</head>

<?php

$user = $_SESSION['user'];

?>

<body>
    <main class="flex h-screen">
        <!-- about me section -->
        <section class="flex-1 bg-gray-300">
            User Detail Section
        </section>

        <!-- general chat section -->
        <section class="flex-[2] flex flex-col">
            <div class="pt-5">
                <h1 class="text-center">General Chat</h1>
            </div>
            <div class="overflow-y-scroll h-full" id="history">

            </div>
            <div class="flex">
                <input class="bg-gray-50 border border-blue-300 text-gray-900 text-sm block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter message here..." type="text" name="message" id="message">
                <button id="send" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                    Send
                </button>
            </div>
        </section>

        <!-- users section -->
        <section class="flex-1 bg-gray-300">
            All Users
        </section>

    </main>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>