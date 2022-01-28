<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBlogsInCategories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function render()
    {
        $blogs=Blog::where("category_id",$this->category_id)->orderBy("id","desc")->paginate(10);
        return view('livewire.show-blogs-in-categories',compact("blogs"));
    }
}
