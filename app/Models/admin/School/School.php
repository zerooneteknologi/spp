<?php

namespace App\Models\admin\School;

use Database\Factories\Admin\School\SchoolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    /** @use HasFactory<SchoolFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function academicYears(): HasMany
    {
        return $this->hasMany(\App\Models\admin\AcademicYear\AcademicYear::class);
    }

    protected static function newFactory()
    {
        return SchoolFactory::new();
    }
}
