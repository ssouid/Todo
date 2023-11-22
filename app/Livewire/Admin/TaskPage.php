<?php

namespace App\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskNotification;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Notification;

use Livewire\Component;




#[Layout('layout.app')]
class TaskPage extends Component
{
    use WithPagination;

    public $title, $description, $status, $priority, $due_date, $task_id, $created_by;

    public $search = '';
    public $selectdtask = [];
    public   $cates = [];
    public $selectedUsers = [];

    protected $rules = [
        'title'       => 'required|string',
        'description' => 'required|string',
        'status'      => 'required|string',
        'priority'    => 'required|string',
        'due_date'    => 'required|date',
    ];

    public function render()
    {
         sleep(0.9);
    
        return view(
            'livewire.admin.tasks.task-page',
            [
                'tasks' =>  Task::with(['categories', 'users', 'createdby'])
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

        $data['created_by'] = auth()->user()->id;

        $task = Task::create($data);

        $task->users()->attach($this->selectedUsers);

        $task->categories()->attach($this->cates);

        $users = user::find($this->selectedUsers);

        Notification::send($users, new TaskNotification($task));

        $this->resetInput();

        flash()->addSuccess('Task added successfully');
    }



    public function resetInput()
    {
        $this->title         = '';
        $this->description   = '';
        $this->status        = '';
        $this->priority      = '';
        $this->due_date      = '';
        $this->task_id       = '';
        $this->cates   = '';
        $this->created_by    = '';
        $this->selectedUsers = '';
    }
    public function update()
    {
        $data = $this->validate($this->rules);
    }

    public function setdeleteid($id)
    {
        $this->task_id = $id;
    }

    public function destroyUser()
    {
        $task = Task::find($this->task_id);
        if ($task) {
            $task->users()->detach();
            $task->categories()->detach();
            $task->delete();
        }
        flash('The task deleted successfully', 'success');
    }

    public function showTask($taskID,$btn)
    {

        $task = Task::findOrFail($taskID);

        $this->title       =  $task->title;
        $this->description =  $task->description;
        $this->status      =  $task->status;
        $this->priority    =  $task->priority;
        $this->due_date    =  $task->due_date;
        $this->selectdtask =  $task->users;
        $this->cates =  $task->categories;
      
    }
}
  