<?php

namespace App\DataStorage\MySQL\Setting;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'setting';
}
