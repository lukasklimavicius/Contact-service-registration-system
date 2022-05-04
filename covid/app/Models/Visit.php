<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
                'visitor_id',
                'time_from',
                'time_to',
                'visited_company',
                'created_at'
    ];
}
