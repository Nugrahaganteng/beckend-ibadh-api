<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
  protected $table = 'ibadahs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
        'ibadah',
        'jenis',
        'waktu',
        
 
        
    ];
}
