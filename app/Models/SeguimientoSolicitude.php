<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoSolicitude extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'seguimientoSolicitudes';

    protected $fillable = ['solicitud_id','persona_id','fecha_seguimiento','estado_anterior','estado_nuevo','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitudesMejora()
    {
        return $this->hasOne('App\Models\SolicitudesMejora', 'id', 'solicitud_id');
    }
    
}
