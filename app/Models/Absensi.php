<?php

namespace App\Models;
use App\Models\DataPegawai;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    protected $table = 'absensi';
	protected $primaryKey = 'id';

    function handleUploadFoto()
	{
        // $this->handleDelete();
		if (request()->hasFile('foto')) {
			$foto = request()->file('foto');
			$destination = "images/absensi";
			$randomStr = Str::random(5);
			$filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto->extension();
			$url = $foto->storeAs($destination, $filename);
			$this->foto = "app/" . $url;
			$this->save();
		}
    }

	function DataPegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'id_user');
    }
}
