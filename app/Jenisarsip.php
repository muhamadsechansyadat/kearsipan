<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisarsip extends Model
{	
	public $table = 'jenisarsips';
    protected $fillable = ['jenis_surat'];
    protected $primaryKey = 'id';
}
