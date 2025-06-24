<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'personas';

    protected $fillable = ['nombres','apellidos','cedula','sexo','fecha_nacimiento','estado_civil','direccion','telefono','correo','ingresos','carga_familiar','tiene_carnet','fecha_registro','estado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beneficios()
    {
        return $this->hasMany('App\Models\Beneficio', 'persona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carnets()
    {
        return $this->hasMany('App\Models\Carnet', 'persona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosCensales()
    {
        return $this->hasMany('App\Models\DatosCensale', 'persona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialCarnets()
    {
        return $this->hasMany('App\Models\HistorialCarnet', 'persona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seguimientoSolicitudes()
    {
        return $this->hasMany('App\Models\SeguimientoSolicitude', 'persona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudesMejoras()
    {
        return $this->hasMany('App\Models\SolicitudesMejora', 'persona_id', 'id');
    }
    
}
