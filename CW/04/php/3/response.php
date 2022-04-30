<?php

$more = $_GET['more'] ?? '';

$add = implode(',', $more);

header("Location: index.php?more=$add");
