<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;
    protected $fillable=[
     'home', 'away','competition','odds','country','prediction',
        'prediction_id','time','market','result','status','federation'
    ];
}
