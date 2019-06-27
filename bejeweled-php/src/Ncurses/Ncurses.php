<?php

namespace Bejeweled\Ncurses;

use wapmorgan\NcursesObjects\Ncurses as NcursesBase;

class Ncurses extends NcursesBase
{
    public function startColor(): Ncurses
    {
        ncurses_start_color();

        return $this;
    }
}
