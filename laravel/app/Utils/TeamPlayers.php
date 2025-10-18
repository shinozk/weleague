<?php

namespace App\Utils;

use Illuminate\Support\Collection;

class TeamPlayers
{
    public static function sortMemberList($list): Collection
    {
        //GK -> DF -> MF -> FW -> etc -> 監督
        //背番号順
        $sort = [
            'GK' => 1,
            'CB' => 2,
            'LSB' => 3,
            'RSB' => 4,
            'DF' => 5,
            'DF/MF' => 6,
            'DMF' => 7,
            'CMF' => 8,
            'OMF' => 9,
            'MF' => 10,
            'MF/FW' => 11,
            'LWG' => 12,
            'RWG' => 13,
            'CF' => 14,
            'SS' => 15,
            'FW' => 16,
            'etc' => 17,
            '監督' => 18,
        ];

        return $list->sortBy(function ($row, $key) use ($sort) {
            $postion_num = $sort[$row->position] ?? 99;
            return $postion_num * 1000 + $row->uniform_number;
        });
    }
}
