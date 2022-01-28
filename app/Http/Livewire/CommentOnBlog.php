<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentOnBlog extends Component
{
    public $blog;
    public $comment;
    public $blogComments;

    protected $rules=[
        "comment"=>"required|min:5"
    ];

    protected $messages=[
        "comment.required"=>"Please type something!",
        "comment.min"=>"Comment must be at least 5 characters"
    ];


    public function addComment(){
        $this->validate();


        $this->blog->comments()->create([
            "comment"=>$this->comment,
            "username"=> "user-".\Str::random(10)
        ]);

        $this->comment="";
        $this->mount();

        $this->dispatchBrowserEvent("commentAdded");
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function mount(){
        $this->blogComments=$this->blog->comments()->latest()->get();
    }


    public function render()
    {
        return view('livewire.comment-on-blog');
    }
}
