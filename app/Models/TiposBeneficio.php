<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposBeneficio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipos_beneficio';

    protected $fillable = ['nombre','descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beneficios()
    {
        return $this->hasMany('App\Models\Beneficio', 'tipos_beneficio_id', 'id');
    }
}
