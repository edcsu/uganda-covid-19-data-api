<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UgandaData extends Model
{
    use App\Models\Concerns\UsesUuid;

    protected $guarded = [];

    protected $table = 'uganda_data';

    protected $fillable = ['total_cases', 'new_cases', 'total_deaths', 'new_deaths', 'total_recoveries', 'new_recoveries', 'total_tests', 'new_tests', 'date_for'];
}
