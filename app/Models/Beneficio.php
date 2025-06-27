<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'beneficio';

    protected $fillable = ['persona_id','tipos_beneficio_id','fecha_entrega','descripcion'];
	
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

    /*
    public function tiposBeneficio()
    {
        return $this->hasOne('App\Models\TiposBeneficio', 'id', 'tipos_beneficio_id');
    }
    */
    public function tipoBeneficio(){

        return $this->belongsTo(TiposBeneficio::class, 'tipos_beneficio_id');
    }
    
}
