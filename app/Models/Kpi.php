<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scorecard()
    {
        return $this->belongsTo(Scorecard::class, 'scorecard_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function kpiactivities()
    {
        return $this->hasMany(KpiActivity::class, 'id');
    }

}
