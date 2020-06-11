<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    public $table = 'suratkeluars';
    protected $fillable = ['pengirim','no_surat','perihal','lampiran','id_jenis','ditujukan']; 
    protected $primaryKey = 'id';
}
