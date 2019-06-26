<?php

namespace Bejeweled;

use wapmorgan\NcursesObjects\Ncurses;
use wapmorgan\NcursesObjects\Window;

class Bejeweled
{
    public function init(): void
    {
        $ncurses = new Ncurses();
        $ncurses
            ->setEchoState(false)
            ->setCursorState(Ncurses::CURSOR_INVISIBLE)
            ->refresh();

        $mainWindow = new Window();
        $mainWindow
            ->border()
            ->title('Hello! Today is '.date('d.m.Y'))
            ->refresh();

        $window = Window::createCenteredOf($mainWindow, 10, 10);
        $window
            ->border()
            ->moveCursor(3, 4)
            ->drawStringHere('OK!')
            ->refresh();

        register_shutdown_function(function () {
            echo 'im called';
            ncurses_end();
        });

        while (true) {
            $char = $ncurses->getCh();
            if (in_array($char, [113, 27], true)) {
                unset($ncurses);
                break;
            }

            $window->erase();
            $window->border();
            $window->moveCursor(3, 4);
            $window->drawStringHere($char);
            $window->refresh();
            sleep(0.1);
        }

        ncurses_end();
    }
}
