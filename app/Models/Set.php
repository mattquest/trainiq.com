<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends BaseModel
{
    use HasFactory;

    public function movement() {
        return $this->belongsTo(Movement::class);
    }
}
