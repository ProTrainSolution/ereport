<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiDepartment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scorecard()
    {
        return $this->belongsTo(Scorecard::class, 'scorecard_id');
    }
}
