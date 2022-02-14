<?php

use PHPUnit\Framework\TestCase;

final class SeoScoreSampleTest extends TestCase
{
    public static $answerFilepath = __DIR__ . '/../4.php';

    public function setUp(): void
    {
        require_once self::$answerFilepath;
    }

    public function testMixed()
    {
        $page =
            '<html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title> quera </title>
                    <meta name="description" content="quera-codecup-college-magnet">
                    <meta name="robots" content="index, follow">
                </head>
            <body>
                <header>
                    <h1> quera </h1>
                </header>
                <section>
                    <h2> quera </h2>
                    <h3> quera </h3>
                    <h3> quera </h3>
                    <h3> quera </h3>
                </section>
                <footer>
                    <h2> quera </h2>
                </footer>
            </body>
            </html>';
        $this->assertSame(100, seoScore($page));
    }
}
