<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetGroup extends Model
{
    use HasFactory;

    public function sets() {
        return $this->hasMany(Set::class);
    }

}
