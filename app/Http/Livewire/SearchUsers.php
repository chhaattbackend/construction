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
        $users = User::where('name','LIKE',$searchTerm)->paginate(10)->setPath('');

       
        return view('livewire.search-users',['users' =>$users]);

        // return view('livewire.search-users', [
        //     'users' => User::where('name', $searchTerm)->paginate(10),
        // ]);
    }
}
