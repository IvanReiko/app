<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Machine extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];


    public function employees(): HasMany
    {
        return $this->hasMany(WorkHistory::class);
    }
}
