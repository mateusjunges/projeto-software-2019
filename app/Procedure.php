<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedure extends Model
{
    use SoftDeletes;

    protected $table = 'procedures';

    protected $fillable = [
        'name',
        'sus_code',
    ];

    protected $dates = ['deleted_at'];
}
