<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori','slug'];
    public $timestamps = true;

    public function Barang()
    {
        return $this->hasMany('App\Barang', 'kategori_id');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($kategori) {
            // mengecek apakah penulis masih punya buku
            if ($kategori->Barang->count() > 0) {
                // menyiapkan pesan error
                $html = 'Kategori tidak bisa dihapus karena masih digunakan oleh Barang : ';
                $html .= '<ul>';
                foreach ($kategori->Barang as $data) {
                    $html .= "<li>$data->judul</li>";
                }
                $html .= '</ul>';
                Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>$html
                ]);
                // membatalkan proses penghapusan
                return false;
            }
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
