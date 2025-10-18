<?php

namespace App\DataStorage\MySQL\Player;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'player';

    public function setYear(int $year): void
    {
        $this->setTable(sprintf($this->table, $year));
    }
}
