<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['gambar','merk','slug','kategori_id','model','deskripsi','publish'];
    public $timestamps = true;

    public function Kategori()
    {
        return $this->belongsTo('App\Kategori','kategori_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
