<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentPhotos extends Model
{

    protected $table = 'establishment_photos';

    protected $fillable = [

        'photo', 'establishments_id'

        ];

    public function establishment(){

        return $this->belongsTo(Establishments::class);

    }

}
