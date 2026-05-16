<?php

namespace App\Models\admin\Dsp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DspPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'academic_year_id',
        'total_amount',
        'installment_count',
    ];

    public function academicYear()
    {
        return $this->belongsTo(\App\Models\admin\AcademicYear\AcademicYear::class);
    }

    public function installments()
    {
        return $this->hasMany(DspInstallment::class);
    }
}
