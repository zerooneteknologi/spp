<?php

namespace App\Models\admin\AcademicYear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    /** @use HasFactory<\Database\Factories\Admin\AcademicYear\AcademicYearFactory> */
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'start_year',
        'end_year',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'start_year' => 'integer',
            'end_year' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function school()
    {
        return $this->belongsTo(\App\Models\admin\School\School::class);
    }

    protected static function newFactory()
    {
        return \Database\Factories\Admin\AcademicYear\AcademicYearFactory::new();
    }
}
