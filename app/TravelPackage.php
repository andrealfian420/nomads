<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event', 'language',
        'foods', 'departure_date', 'duration', 'type', 'price'
    ];

    protected $hidden = [];

    public function galleries()
    {
        /*
        this travel packages has many gallery who belongs to its own id
        travel_packages_id => foreign key from galleries table
        id => primary key from travel_package table
        */
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}
