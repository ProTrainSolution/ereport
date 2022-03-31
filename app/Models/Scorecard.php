<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scorecard extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kpidepartments()
    {
        return $this->hasMany(KpiDepartment::class);
    }

    public function kpis()
    {
        return $this->hasMany(Kpi::class);
    }
}
