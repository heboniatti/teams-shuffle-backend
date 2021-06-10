<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Models\User;
use Illuminate\Http\Request;

class WodController extends Controller
{
    public function getList()
    {
        $users = Name::all();

        return response()->json($users);
    }

    public function store(Request $request)
    {
        $user = Name::create($request->all());

        return response()->json($user);
    }

    public function delete($id)
    {
        Name::findOrFail($id)->delete();

        return response([]);
    }

    public function shuffle()
    {
        $users = Name::all();

        $users = $users->shuffle()
            ->shuffle()
            ->shuffle()
            ->chunk(3);

        return response()->json($users);
    }
}
