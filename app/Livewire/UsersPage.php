<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use League\Flysystem\MountManager;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layout.app')]
class UsersPage extends Component
{
    use WithPagination;

    use WithFileUploads;



    public $username, $email, $password, $user_type, $avatar;
    public $user_id;
    public $user;
    public $editform = false;
    public $modal_title = 'Create New User';
    public $search = '';


    public function save()
    {
        $data = $this->validate([

            'username' => 'required|string|min:2|max:100',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required|in:user,admin',
            'avatar' =>  'nullable',
        ]);

     
        $user =user::create($data);

      

        $this->resetInput();
        //todo fix close model not working
        $this->dispatch('close-modal');
        flash('The user added successfully', 'success');
    }
    public function resetInput()
    {
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->user_type = '';
        $this->avatar = '';
    }


    public function render()
    {
        sleep(0.9);
        return view(
            'livewire.users.users-index',
            ['users' => User::search('username', $this->search)->paginate(7)]
        );
    }

    //todo trying to do create/update with the modal 
    public function edit($id)
    {
        $this->editform = true;
        $this->modal_title = 'Edit User';
        $this->user = user::findorfail($id);


        $this->username =  $this->user->username;
         //$this->password =  $this->user->password;
        $this->email =  $this->user->email;
        $this->user_type =  $this->user->user_type;
        // $this->avatar =  $this->user->avatar;

    }

    public function update()
    {

        $data = $this->validate([
            'username' => 'required|string|min:2|max:100',
            'password' => 'nullable',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'user_type' => 'required|in:user,admin',
            'avatar' =>  'nullable',
        ]);

        if (!data_get($data, 'password')) {
            unset($data['password']);
        }
        
        if (data_get($data, 'avatar')) {
            $filename = $this->avatar->store('/', 'avatars');
        }else{
            unset($data['avatar']);
            $filename='';

        } 

         
        $user = user::findorfail($this->user->id);

           //todo find a way to unset password if its null

        $user->update([

            'username' =>  $this->username,
            'password' => $this->password,
            'email' =>  $this->email,
            'user_type' =>  $this->user_type,
            'avatar' =>  $filename,

        ]);

        $this->resetInput();
        //todo fix close model not working
        $this->dispatch('close-modal');
        flash('The user updated successfully', 'success');
    }

    public function setdeleteid($id)
    {
        $this->user_id = $id;
    }

    public function destroyUser()
    {
        $user = user::find($this->user_id);
        if ($user) {
            $user->delete();
        }
        flash('The user deleted successfully', 'success');

        $this->dispatch('close-modal');
    }
}
