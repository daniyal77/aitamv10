<?php

namespace Modules\Vacation\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    protected $appends = ['start_date_jalali', 'end_date_jalali'];

    public function getStartDateJalaliAttribute(): string
    {
        return verta($this->start_date)->format('Y/m/d');
    }

    public function getEndDateJalaliAttribute(): string
    {
        return verta($this->end_date)->format('Y/m/d');
    }

}
