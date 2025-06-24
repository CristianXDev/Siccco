<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCarnet extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'historial_carnets';

    protected $fillable = ['persona_id','codigo_carnet','fecha_cambio','nivel_educativo','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
}
