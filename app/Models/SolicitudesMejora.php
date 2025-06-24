<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesMejora extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'solicitudes_mejoras';

    protected $fillable = ['tipos_solicitud_id','persona_id','fecha_creacion','fecha_cierre','descripcion','observaciones','estado','responsable_id','comentarios_cierre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seguimientoSolicitudes()
    {
        return $this->hasMany('App\Models\SeguimientoSolicitude', 'solicitud_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposSolicitud()
    {
        return $this->hasOne('App\Models\TiposSolicitud', 'id', 'tipos_solicitud_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'responsable_id');
    }
    
}
