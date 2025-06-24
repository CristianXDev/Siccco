<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposSolicitud extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipos_solicitud';

    protected $fillable = ['nombre','descripcion','prioridad'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudesMejoras()
    {
        return $this->hasMany('App\Models\SolicitudesMejora', 'tipos_solicitud_id', 'id');
    }
    
}
