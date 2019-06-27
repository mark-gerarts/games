<?php

namespace Bejeweled;

use Bejeweled\Ncurses\Key;
use Bejeweled\Ncurses\Ncurses;
use wapmorgan\NcursesObjects\Colors;
use wapmorgan\NcursesObjects\Window;

class Bejeweled
{
    public function init(): void
    {
        $ncurses = new Ncurses();
        $ncurses
            ->startColor()
            ->setEchoState(false)
            ->refresh();

        $mainWindow = new Window();
        $mainWindow
            ->border()
            ->title('Hello! Today is '.date('d.m.Y'))
            ->refresh();

        register_shutdown_function(function () {
            ncurses_end();
        });

        while ($char = $ncurses->getCh()) {
            if (in_array($char, [Key::KEY_Q, Key::KEY_ESC], true)) {
                unset($ncurses);
                break;
            }
            $mainWindow->title($char);
            $mainWindow->refresh();
        }

        ncurses_end();
    }
}
