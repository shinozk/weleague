<?php

namespace App\DataStorage\MySQL\Game;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'game';

    public function setYear(int $year)
    {
        $this->setTable(sprintf($this->table, $year));
    }
}
