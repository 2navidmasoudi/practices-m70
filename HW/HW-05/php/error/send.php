<?php

function sendError($page, $error, $params = "")
{
    header("Location: /src/$page/?error={$error}{$params}");
    exit;
}
