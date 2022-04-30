<?php

if (isset($_POST['day'])) {
    $day = $_POST['day'];

    $result = '';

    // if ($day == 'monday')
    //     $result = "Laugh on Monday, laugh for danger.";
    // elseif ($day == "tuesday")
    //     $result = "Laugh on Tuesday, kiss a stranger.";
    // elseif ($day == "wednesday")
    //     $result = "Laugh on Wednesday, laugh for a letter.";
    // elseif ($day == "thursday")
    //     $result = "Laugh on Thursday, something better.";
    // elseif ($day == "friday")
    //     $result = "Laugh on Friday, laugh for sorrow.";
    // elseif ($day == "saturday")
    //     $result = "Laugh on Saturday, joy tomorrow.";

    switch ($day) {
        case 'monday':
            $result = "Laugh on Monday, laugh for danger.";
            break;
        case 'tuesday':
            $result = "Laugh on Tuesday, kiss a stranger.";
            break;
        case 'wednesday':
            $result = "Laugh on Wednesday, laugh for a letter.";
            break;
        case 'thursday':
            $result = "Laugh on Thursday, something better.";
            break;
        case 'friday':
            $result = "Laugh on Friday, laugh for sorrow.";
            break;
        case 'saturday':
            $result = "Laugh on Saturday, joy tomorrow.";
            break;
    }

    header("Location: index.php?response={$result}");
}
