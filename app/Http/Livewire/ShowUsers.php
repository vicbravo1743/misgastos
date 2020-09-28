<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Fondo;
use Illuminate\Support\Facades\Hash;

class ShowUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['userId'];
    public $name, $email, $password, $password_confirmation, $userId, $showEdit = false, $showCreate = true;

    public function resetValues($properties){
        $this->reset($properties);
    }

    public function render()
    {
        return view('livewire.users.show-users', [
            'users' => User::orderBy('id', 'asc')->id($this->userId)->paginate(8)
        ]);
    }

    public function index(){    
        return view('livewire.users.index');
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        Fondo::create([
            'debito' => 0,
            'credito' => 0,
            'efectivo' => 0,
            'user_id' => $user->id
        ]);
        
        session()->flash('message', 'El usuario se guardo correctamente');

        $this->reset();

    }

    public function create(){
        $this->reset();
        $this->showCreate = true;
        $this->showEdit = false;
    }

    public function edit($id){
        $this->showEdit = true;
        $this->showCreate = false;

        $user = User::find($id);

        $this->name = $user->name;
        $this->email = $user->email;
    }
}
