<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'machine_id', 'started_at', 'ended_at','created_at','updated_at'];

}
