<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medic extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name', 'last_name', 'cuit', 'dni', 'medic_type_id', 'license', 'street_address', 'blood_type_id',
    ];

    public function internments()
    {
        return $this->belongsToMany('App\Internment');
    }

    public function medic_type()
    {
        return $this->belongsTo('App\MedicType');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType');
    }
}
