<?php

# https://quera.org/problemset/121725/
# To test this function, simply run "php test/4.php"

# or if you have installed phpunit
# run "phpunit test/SeoScoreSampleTest.php"

// find children of tags without attr.
function getTagChildren($string, $tagname)
{
    $pattern = "/\<{$tagname}\>(.*)\<\/{$tagname}\>/";
    preg_match_all($pattern, $string, $matches);
    return $matches[1];
}

function getTag($string, $tagname)
{
    $pattern = "/\<({$tagname})\>/";
    preg_match_all($pattern, $string, $matches);
    return $matches[1] ?? [];
}

// find content of meta tags.
function getMetaContent($string, $name)
{
    $pattern = "/\<meta +name=\"{$name}\" +content=\"(.*)\"\>/";

    // for charset we just change the pattern.
    if ($name == "charset") {
        $pattern = "/\<meta +charset=\"(.*)\">/";
    }

    preg_match($pattern, $string, $matches);

    // preg_match 
    return $matches[1] ?? [];
}

function seoScore(string $html): int
{
    $score = 0;

    // add 10 if title children is less than 60 char else 7 exist.
    $title = getTagChildren($html, "title")[0] ?? null;
    if ($title) {
        $score += strlen(trim($title)) <= 60 ? 10 : 7;
    }

    // add 10 if description content is less than 160 char else 7 exist.
    $description = getMetaContent($html, "description");
    if ($description) {
        $score += strlen(trim($description)) <= 160 ? 10 : 7;
    }

    // add 10 if viewports exist.
    $viewport = getMetaContent($html, "viewport");
    $score += $viewport ? 10 : 0;

    // add 10 if robots exist.
    $robots = getMetaContent($html, "robots");
    $score += $robots ? 10 : 0;

    // add 10 if charset exist.
    $charset = getMetaContent($html, "charset");
    $score += $charset ? 10 : 0;

    // add 10 if h1 exist only 1 time, 7 if more.
    $h1 = getTag($html, "h1");
    if (count($h1)) {
        $score += count($h1) == 1 ? 10 : 7;
    }

    // add 5 by h2 and h3.
    $h2 = getTag($html, "h2");
    $h3 = getTag($html, "h3");
    $score += count($h2) ? 5 : 0;
    $score += count($h3) ? 5 : 0;

    // add 10 by section, footer and header.
    $header = getTag($html, "header");
    $footer = getTag($html, "footer");
    $section = getTag($html, "section");
    $score += count($header) ? 10 : 0;
    $score += count($footer) ? 10 : 0;
    $score += count($section) ? 10 : 0;

    var_dump($h2);
    return $score;
}
