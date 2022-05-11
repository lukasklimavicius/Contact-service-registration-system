<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    protected $fillable = ['illness_name', 'illness_description'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'illnesses';
}
