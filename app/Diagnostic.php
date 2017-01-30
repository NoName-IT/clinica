<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
     use SoftDeletes;

        protected $fillable = [
        'code','description',
    ];
    
    public function diagnostics()
    {
        return $this->hasMany('App\Internment');
    }
}
