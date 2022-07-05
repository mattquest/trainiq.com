<?php

namespace App\Models;

use App\Models\UserScopedModelTrait;
use Apps\Enums\MovementEffort;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends BaseModel
{

    use UserScopedModelTrait;
    use HasFactory;

    protected $casts = [
        'effort' => MovementEffort::class,
    ];

}


