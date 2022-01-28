<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\LeftBar;
use App\Models\RightBar;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    // public $blogs;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $leftBars;
    public $rightBars;

    public function mount(){

        $this->leftBars=LeftBar::latest()->get();
        $this->rightBars=RightBar::latest()->get();

    }


    public function render()
    {
        $blogs=Blog::latest()->paginate(4);
        return view('livewire.blogs',compact('blogs'));
    }
}
