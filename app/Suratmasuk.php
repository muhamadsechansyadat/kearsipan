<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
	public $table = 'suratmasuks';
    protected $fillable = ['pengirim','no_surat','tgl_surat','perihal','lampiran','id_jenis']; 
    protected $primaryKey = 'id';
}
