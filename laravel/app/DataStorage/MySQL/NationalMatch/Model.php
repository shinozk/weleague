<?php

namespace App\DataStorage\MySQL\NationalMatch;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'national_match';

    public function setYear(int $year): void
    {
        $this->setTable(sprintf($this->table, $year));
    }
}
