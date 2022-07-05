<?php

namespace App\Models;

use DateTime;
use ErrorException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Session extends BaseModel
{
    use HasFactory;

    public function setGroups() {
        return $this->hasMany(SetGroup::class);
    }

    public static function getOrCreateTodaysSession():Session {
        return Session::where([
            'performed_date' => Carbon::now()->format('Y-m-d'),
            ])
            ->orWhere([
                'prescribed_date' => Carbon::now()->format('Y-m-d'),
            ])->firstOrCreate([
                'performed_date' =>  Carbon::now()->format('Y-m-d'),
                'user_id' => Auth::user()->id,
            ]);
    }
}
