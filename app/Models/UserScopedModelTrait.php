<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

trait UserScopedModelTrait {

    protected static function booted()
    {
        static::addGlobalScope(new AuthenticatedUser);
    }

}


class AuthenticatedUser implements Scope
{

    public function apply(Builder $builder, Model $model) {
        $user_id = Auth::user()->id ?? null;
        $builder->where('user_id', $user_id)->orWhere('user_id', null);
    }

}