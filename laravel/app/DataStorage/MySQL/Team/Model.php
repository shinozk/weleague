<?php

namespace App\DataStorage\MySQL\Team;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'team';

    public function setYear(int $year): void
    {
        $this->setTable(sprintf($this->table, $year));
    }
}
