<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'period',
        'bonus_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function calculateBonus($user)
    {
        // Calculate the bonus based on the sponsorship hierarchy
        $bonus = 0;
        $directBonus = 0.20; // 20% on own purchases
        $firstLevelBonus = 0.05; // 5% on first level purchases
        $secondLevelBonus = 0.03; // 3% on second level purchases
        $thirdLevelBonus = 0.02; // 2% on third level purchases

        // Add logic here to calculate the bonus based on the user's purchases and their sponsored users' purchases

        return $bonus;
    }
}
