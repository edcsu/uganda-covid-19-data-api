<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UgandaData extends Model
{
    protected $table = 'uganda_data';

    protected $fillable = ['totalCases', 'newCases', 'totalDeaths', 'newDeaths', 'totalRecoveries', 'newRecoveries', 'totalTests', 'newTests', 'date'];
}
