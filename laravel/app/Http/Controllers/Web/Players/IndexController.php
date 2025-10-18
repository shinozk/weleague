<?php

namespace App\Http\Controllers\Web\Players;

use App\Http\Controllers\Controller;
use App\Repositories\PlayerRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $players = PlayerRepository::fetch($request->name)->paginate(20);
        return view('pages.players.index', compact('players'));
    }
}
