<?php

namespace App\DataStorage\MySQL\Comment;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $connection = 'comment';
}
