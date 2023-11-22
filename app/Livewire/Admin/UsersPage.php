<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use League\Flysystem\MountManager;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;


#[Layout('layout.app')]
class UsersPage extends Component
{
    use WithPagination;

    use WithFileUploads;



    public $user, $user_id, $username, $email, $password, $user_type, $avatar,$created_at;
    public $taskCount, $contributeCount, $completedCount;

    public $search = '';



    public function render()
    {
        sleep(0.9);
        return view(
            'livewire.admin.users.users-index',
            ['users' => User::search('username', $this->search)->paginate(7)]
        );
    }

    protected  $rules= [
        'username' => 'required|string|min:2|max:100',
        'password' => 'nullable',
        'email' => 'required|email|unique:users,email,',
        'user_type' => 'required|in:user,admin',
       // 'avatar'=> 'nullable',
    ];


    public function save()
    {
        $data = $this->validate($this->rules);
           
        if(isset($this->avatar ))
        {$data['avatar'] = $this->avatar->store('/', 'avatars');}
        else 
        {unset($data['avatar']);}
          
        $user = user::create($data);

        $this->resetInput();

        flash('The user added successfully', 'success');
    }

    public function resetInput()
    {
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->user_type = '';
        $this->avatar = '';
        $this->user_id = '';
    }

    public function showUser($id,$btn)
    {
        $user = user::findorfail($id);
        $this->user_id = $id;
        $this->username   =  $user->username;
       // $this->password   =  $user->password;
        $this->email      =  $user->email;
        $this->user_type  =  $user->user_type;
       if($btn=='view') {$this->avatar =  $user->avatar;} 
        $this->created_at = $user->created_at->diffForHumans();

        $this->contributeCount = count($user->tasks);
        $this->taskCount = count($user->createdTask);
        $this->completedCount = count($user->createdTask->where('status', '=', 'Completed'));
      
    }

    public function update()
    {
        //todo find a way to unset password and avatar if its null

    
        $data = $this->validate([

            'username' => 'required|string|min:2|max:100',
            'password' => 'nullable',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'user_type' => 'required|in:user,admin',
    
        ]);

       if (!isset($this->password)){unset($data['password']);} 

       if(isset($this->avatar ))
       {$data['avatar'] = $this->avatar->store('/', 'avatars');}
       else 
       {unset($data['avatar']);}

     
        $user = user::findorfail($this->user_id);

        $user->update($data);

        $this->resetInput();

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
    }
}
