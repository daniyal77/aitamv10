<?php

namespace Modules\Calendar\App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Calendar extends Model
{


    protected $fillable = ['name', 'date', 'unit_id', 'show_all'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            Cache::forget('caldeners' . Auth::user()->RoleId);
        });

        static::updating(function ($instance) {
            Cache::forget('caldeners' . Auth::user()->RoleId);
        });

        static::deleting(function ($instance) {
            Cache::forget('caldeners' . Auth::user()->RoleId);
        });
    }
}
