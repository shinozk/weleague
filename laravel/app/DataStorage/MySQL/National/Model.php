<?php

namespace App\DataStorage\MySQL\National;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'national';

    public function setYear(int $year)
    {
        $this->setTable(sprintf($this->table, $year));
    }
}
