<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosCensale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'datos_censales';

    protected $fillable = ['persona_id','nivel_educativo','ocupacion','discapacidad','tipo_discapacidad','seguro_medico','nombre_seguro','vive_desde'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
}
