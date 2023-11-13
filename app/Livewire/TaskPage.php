<?php

namespace App\Livewire;

use App\Models\Task ;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;




#[Layout('layout.app')]
class TaskPage extends Component
{

    public $title, $description, $status, $priority, $due_date, $user_id, $created_by;

    public $search = '';


    public function render()
    {
      
        sleep(0.9);
        return view(
            'livewire.tasks.task-page',
            [
                'tasks' =>  Task::with(['categories', 'users','createdby'])->search('title', $this->search)->paginate(7),
                

                'userslist' => User::all(),
            ]
        );
        //todo fix rolations data access
    }

    public function save()
    {
     

        $data = $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'due_date' => 'required|date',
            'created_by'=> 'nullable',
            'user_id' => 'required',
           
        ]);
        
       
        $data['created_by']= auth()->user()->id;

        $task=Task::create($data);

        $task->users()->attach($this->user_id);

        $this->resetInput();
        //todo fix close model not working
       // $this->dispatch('close-modal');
        flash('Task added successfully', 'success');
    }


    public function test(){

        $this->dispatch('close-modal');
    }
    public function resetInput()
    {
        $this->title = '';
        $this->description = '';
        $this->status = '';
        $this->priority = '';
        $this->due_date = '';
    }
}
