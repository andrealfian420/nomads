<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'image'
    ];

    protected $hidden = [];

    // function for relation between galleries table and travel package table
    public function travel_package()
    {
        //  travel_packages_id => foreign key at gallery table
        //  id => primary key at travel_package table
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
