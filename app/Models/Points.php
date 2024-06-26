<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Points extends Model
{
    use HasFactory;

    protected $table = 'table_points'; //modal digunakan untuk berinteraksi dengan database, satu model satu tabel

    //protected $fillable = ['name', 'description', 'geom'];

    protected $guarded = ['id'];

    public function points()
    {
        return $this->select(DB::raw('id, name, description, image, 
        ST_AsGeoJSON(geom) as geom, created_at, updated_at'))->get();
    }
    
    public function point($id)
    {
        return $this->select(DB::raw('id, name, description, image, 
        ST_AsGeoJSON(geom) as geom, created_at, updated_at'))->where('id', $id)->get();
    }
}                                                                                                                                                                        