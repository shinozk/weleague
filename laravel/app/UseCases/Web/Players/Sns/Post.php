<?php

namespace App\UseCases\Web\Players\Sns;

use App\DataStorage\MySQL\Player\SnsAccount;
use App\Models\Web\Players\Sns\Post as Model;

class Post
{
    public function invoke(array $records)
    {
        foreach ($records as $record) {
            SnsAccount::updateOrCreate(
                ['player_id' => $record->player_id,
                    'sns' => $record->sns->name],
                ['code' => $record->code]
            );
        }
    }
}
