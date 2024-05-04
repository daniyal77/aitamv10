<?php

namespace Modules\Calendar\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Calendar\Database\Factories\CalendarFactory;

class Calendar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): CalendarFactory
    {
        //return CalendarFactory::new();
    }
}
