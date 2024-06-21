<?php

namespace Modules\Calendar\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Calendar\App\Services\CalendarService;

class Calendar extends Model
{
    use SoftDeletes;

    protected $fillable = ['event', 'user_id', 'role_id', 'date', 'is_holiday'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            (new CalendarService())->removeCacheCalendarList();
        });

        static::updating(function ($instance) {
            (new CalendarService())->removeCacheCalendarList();
        });

        static::deleting(function ($instance) {
            (new CalendarService())->removeCacheCalendarList();
        });
    }
}
