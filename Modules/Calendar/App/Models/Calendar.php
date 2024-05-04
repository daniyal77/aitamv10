<?php

namespace Modules\Calendar\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Calendar\App\Services\CalendarService;

class Calendar extends Model
{

    protected $fillable = ['event', 'user_id', 'role_id', 'date'];

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
