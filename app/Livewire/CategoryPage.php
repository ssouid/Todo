<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Task ;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;




#[Layout('layout.app')]
class CategoryPage extends Component
{

    public $name, $position, $cat_id;

    public $search = '';

    protected $rules = [
        'name' => 'required|string',
        'position' => 'required|integer',
    ];

    public function render()
    {
      
        sleep(0.9);
        return view(
            'livewire.categories.category-index',
            [
                'categories' =>  Category::search('name', $this->search) ->paginate(7)
            ]
        );
  
    }

    public function save()
    {
       
        $data = $this->validate($this->rules);

        $category = Category::create($data);

        $this->resetInput();

        flash()->addSuccess('category added successfully');
     
    }



    public function resetInput()
    {
        $this->name = '';
        $this->position = '';
        $this->cat_id = '';
       

    }
    public function update()
    {
        $data = $this->validate($this->rules);

        $category = Category::findOrFail($this->cat_id);

        $category->update($data);

        $this->resetInput();

        flash('Category updated successfully', 'success');

    }

    public function showCategory($categoryID)
    {
        
        $category = Category::findOrFail($categoryID);
         
        $this->name = $category->name;
        $this->position =  $category->position;
        $this->cat_id = $categoryID;
    }

    public function setdeleteid($id)
    {
        $this->cat_id = $id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->cat_id);
        if ($category) {
            $category->delete();
        }
        flash('The category deleted successfully', 'success');
    }
}
