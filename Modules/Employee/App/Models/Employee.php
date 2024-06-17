<?php

namespace Modules\Employee\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['start_contract_jalali', 'end_contract_jalali'];

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    public function getStartContractJalaliAttribute(): string
    {
        return verta($this->start_contract)->format('Y/m/d');
    }

    public function getEndContractJalaliAttribute(): string
    {
        return verta($this->end_contract)->format('Y/m/d');
    }

    public function is_pay_slip()
    {
        return $this->is_pay_slip ? 'بلی' : 'خیر';
    }

    public function is_marriage()
    {
        return $this->is_marriage ? 'متاهل' : 'مجرد';
    }

    public function employeeRequest()
    {
        return $this->belongsTo(EmployeeRequest::class,'personal_id');
    }
}
