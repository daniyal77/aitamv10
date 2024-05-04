<?php

namespace Modules\Vacation\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Vacation\Database\Factories\VacationFactory;

class Vacation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): VacationFactory
    {
        //return VacationFactory::new();
    }
}
