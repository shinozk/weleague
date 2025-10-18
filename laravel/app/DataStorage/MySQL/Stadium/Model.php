<?php

namespace App\DataStorage\MySQL\Stadium;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'stadium';

    public function setYear(int $year): void
    {
        $this->setTable(sprintf($this->table, $year));
    }
}
