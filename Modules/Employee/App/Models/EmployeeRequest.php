<?php

namespace Modules\Employee\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'last_name', 'skils', 'file_resume', 'status'];
    protected $casts = ['skils' => 'array'];


}
