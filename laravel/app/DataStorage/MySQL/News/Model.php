<?php

namespace App\DataStorage\MySQL\News;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'news';
}
