<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Prediction extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'=>'false'
            ]
        ];
    }
    protected $fillable=[
     'home', 'away','competition','odds','country','prediction',
        'prediction_id','match_time','market','result','status','federation','title'
    ];
}
