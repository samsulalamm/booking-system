<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateWiseVacancy extends Model
{
    use HasFactory;
    protected $fillable = [
        'vdate',
        'vacancy',
        'price',
    ];

    public function setVdateAttribute($value)
    {
        $this->attributes['vdate'] = date('Y-m-d', strtotime($value));
    }
}
