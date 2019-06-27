<?php

namespace Bejeweled\Debug;

use Symfony\Component\VarDumper\Caster\ReflectionCaster;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

/**
 * Since we can't use xdebug (PHPStorm's terminal doesn't support ncurses), and
 * we can't use dump (can't echo anything), we'll debug our code by outputting
 * a dump to an HTML file, which we can then view in the browser.
 */
class Debugger
{
    /**
     * @var callable
     */
    private static $handler;

    /**
     * @var string
     */
    private static $outputFile;

    public static function dump($var)
    {
        if (self::$handler === null) {
            self::initHandler();
        }

        (self::$handler)($var);

        return $var;
    }

    public static function setOutputFile(string $file): void
    {
        self::$outputFile = $file;
    }

    public static function initHandler(): void
    {
        $cloner = new VarCloner();
        $cloner->addCasters(ReflectionCaster::UNSET_CLOSURE_FILE_INFO);
        $dumper = new HtmlDumper('php://output');
        // We dump to the output, and then clear it and save it to an HTML file.
        self::$handler = function ($var) use ($cloner, $dumper) {
            ob_start();
            $dumper->dump($cloner->cloneVar($var));
            $dumpOutput = ob_get_clean();

            $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Debug info</title>
</head>
<body>
%s
</body>
</html>
HTML;
            $html = sprintf($html, $dumpOutput);
            file_put_contents(self::$outputFile, $html);
        };
    }
}
