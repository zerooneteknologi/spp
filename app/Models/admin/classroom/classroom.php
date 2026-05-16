<?php

namespace App\Models\admin\classroom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class classroom extends Model
{
    /** @use HasFactory<\Database\Factories\Admin\classroom\classroomFactory> */
    use HasFactory, softDeletes;

    protected $guarded = [''];
}
