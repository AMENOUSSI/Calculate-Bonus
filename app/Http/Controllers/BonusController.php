<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Http\Requests\StoreBonusRequest;
use App\Http\Requests\UpdateBonusRequest;
use App\Models\User;
use Illuminate\Support\Facades\Request;


class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('sponsoredUsers')->get();
        return view('bonuses.index', compact('users'));
    }

    public function calculate(Request $request)
    {
        $users = User::all();

        foreach ($users as $user) {
            $bonusAmount = $user->calculateBonus();

            Bonus::updateOrCreate(
                ['user_id' => $user->id, 'period' => $request->period],
                ['bonus_amount' => $bonusAmount]
            );
        }

        return redirect()->route('bonuses.index')->with('success', 'Bonuses calculated successfully.');
    }

}
