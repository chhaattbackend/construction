<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    use WithPagination;

    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $users = User::where('name','LIKE',$searchTerm)->get();
        return view('livewire.search-users',['users' =>$users]);
    }
}
