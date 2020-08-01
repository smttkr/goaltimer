<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimeRecord extends Model
{
    protected $fillable = [
        'user_id',
        'goal_id',
        'time_record',
    ];

    public function scopeThisMonth($query)
    {
        // 今月だけのデータを返すためのスコープ
        $firstOfMonth = Carbon::now()->firstOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        return $query
        ->whereDate('created_at', '>=', $firstOfMonth)
        ->whereDate('created_at', '<=', $endOfMonth);
    }
}
