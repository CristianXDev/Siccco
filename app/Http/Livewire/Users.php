<?php

namespace App\Http\Livewire;

//Componentes 
use Livewire\Component;
use Livewire\WithPagination;

//Modelos
use App\Models\User;
use App\Models\Auditoria;

//Dependencias
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

//Clase principal
class Users extends Component{

	//Componente - Paginación
	use WithPagination;

	//Integración con Bootstrap
	protected $paginationTheme = 'bootstrap';

	//Variables
	public $selected_id, $keyWord, $nombre, $foto, $apellido, $cedula, $correo, $password, $estatus, $rol;

	//Render
	public function render(){

		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.users.view', [
			'users' => User::latest()
			->orWhere('nombre', 'LIKE', $keyWord)
			->orWhere('apellido', 'LIKE', $keyWord)
			->orWhere('cedula', 'LIKE', $keyWord)
			->orWhere('correo', 'LIKE', $keyWord)
			->orWhere('estatus', 'LIKE', $keyWord)
			->orWhere('rol', 'LIKE', $keyWord)
			->paginate(10),
		]);
	}
	
	//Cerrar modal
	public function cancel(){

		$this->resetInput();
	}
	
	//Resetear Campos
	private function resetInput(){

		$this->foto = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->cedula = null;
		$this->correo = null;
		$this->password = null;
		$this->estatus = null;
		$this->rol = null;
	}

	//Inicializar variables
	public function edit($id){

		$record = User::findOrFail($id);
		$this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->correo = $record-> correo;
		$this->cedula = $record-> cedula;
		$this->estatus = $record-> estatus;
		$this->rol = $record-> rol;
	}


	public function store(){

  		//Validar datos
		$this->validate([
			'nombre' => 'required',
			'apellido' => 'required',
			'cedula' => 'required|min:7|max:8|unique:users,cedula',
			'correo'=>'required|email|unique:users,correo',
			'password'=>'required',
			'rol' => 'required'
		]);

		User::create([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => str_replace(".", "", $this->cedula),
			'correo' => $this-> correo,
			'password' => Hash::make($this->password),
			'estatus' => 'activo',
			'rol' => $this->rol,
		]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Proceso Completado');
	}

	//Actualizar datos
	public function update(){

		//Validar datos
		$this->validate([
			'nombre' => 'required',
			'apellido' => 'required',
			'cedula' => 'required|min:7|max:8|unique:users,cedula,'.$this->selected_id,
			'correo'=>'required|email|unique:users,correo,'.$this->selected_id,
			'rol' => 'required'
		]);

		//Realizar la actualización
		if ($this->selected_id){
			$record = User::find($this->selected_id);
			
			$updateData = [
				'nombre' => $this-> nombre,
				'apellido' => $this-> apellido,
				'cedula' => str_replace(".", "", $this->cedula),
				'correo' => $this->correo,
				'estatus' => $this-> estatus,				
				'rol' => $this->rol,
			];

       		// Verifica si se proporcionó una contraseña
			if (!empty($this->contrasena)){
				$updateData['password'] = Hash::make($this->password);
			}

			$record->update($updateData);

			//Resetar inputs
			$this->resetInput();

			//Cerrar modal
			$this->dispatchBrowserEvent('closeModal');

			//Mensaje guardado en la sesión
			session()->flash('message', 'Proceso realizado correctamente.');
		}
	}
}