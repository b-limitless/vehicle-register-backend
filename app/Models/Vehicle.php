<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    /**
     * Get the model associated with the vehicle.
     */
    protected $table = "vehicles";
    protected $fillable = [ 
                           'licence_number', 
                           'model_id', 
                           'production_year',
                           'mileage', 
                           'date_of_registration',
                           'veteran',
                           'brand'
                           
                        ];

    public function models()
    {
        return $this->hasOne(Model::class);
    }
}
