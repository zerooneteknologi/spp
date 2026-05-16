<?php

namespace App\Models\admin\Dsp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DspInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'dsp_plan_id',
        'installment_number',
        'amount',
        'due_date',
    ];

    public function dspPlan()
    {
        return $this->belongsTo(DspPlan::class);
    }
}
