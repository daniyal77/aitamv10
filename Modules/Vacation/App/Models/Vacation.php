<?php

namespace Modules\Vacation\App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Employee\App\Models\Employee;
use Modules\Vacation\App\Services\VacationService;

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

    public function status()
    {
        return Status::getLabel($this->status);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('orderByIdDesc', function ($builder) {
            $builder->orderBy('id', 'desc');
        });
        self::created(function ($model) {
            (new VacationService())->removeCacheVacation();
        });
        self::updating(function ($model) {
            (new VacationService())->removeCacheVacation();
        });
        self::deleted(function ($model) {
            (new VacationService())->removeCacheVacation();
        });
    }
}
