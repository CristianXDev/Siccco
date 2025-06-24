<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'carnets';

    protected $fillable = ['persona_id','tipos_beneficio_id','numero_carnet','fecha_emision','fecha_vencimiento','qr','estado'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialCarnets()
    {
        return $this->hasMany('App\Models\HistorialCarnet', 'carnet_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }

    public function tiposBeneficio()
    {
        return $this->hasOne('App\Models\TiposBeneficio', 'id', 'tipos_beneficio_id');
    }
    
}
