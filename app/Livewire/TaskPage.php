<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Task ;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;




#[Layout('layout.app')]
class TaskPage extends Component
{

    public $title, $description, $status, $priority, $due_date, $user_id, $created_by;

    public $search = '';
    public $selectdtask =[];
    public   $categories= [];
    public $selectedUsers = [];

    protected $rules = [
        'title' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|string',
        'priority' => 'required|string',
        'due_date' => 'required|date',
    ];

    public function render()
    {
   
        sleep(0.9);
        return view(
            'livewire.tasks.task-page',
            [
                'tasks' =>  Task::with(['categories', 'users','createdby'])
                        ->search('title', $this->search)
                        ->withCount('users')
                        ->paginate(7),
                

                'userslist' => User::all(),
                'categorieslist' => Category::all(),
            ]
        );
  
    }

    public function save()
    {
       
        $data = $this->validate($this->rules);
       
        $data['created_by']= auth()->user()->id;

        $task=Task::create($data);

        $task->users()->attach($this->selectedUsers);

        $task->categories()->attach($this->category);

        $this->resetInput();

        flash()->addSuccess('Task added successfully');
     
    }



    public function resetInput()
    {
        $this->title = '';
        $this->description = '';
        $this->status = '';
        $this->priority = '';
        $this->due_date = '';
        $this->user_id = '';
        $this->categories = '';
        $this->created_by = '';
        $this->selectedUsers='';

    }
    public function update()
    {
        $data = $this->validate($this->rules);

    }

    public function showTask($taskID)
    {
        
        $task = Task::findOrFail($taskID);
         
        $this->title = $task->title;
        $this->description =  $task->description;
        $this->status =  $task->status;
        $this->priority =  $task->priority;
        $this->due_date =  $task->due_date;
       
        $this->selectdtask =  $task->users;
        
        $this->categories =  $task->categories;

       

    }
}
