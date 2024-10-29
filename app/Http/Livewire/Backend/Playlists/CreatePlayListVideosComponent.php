<?php

namespace App\Http\Livewire\Backend\Playlists;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CreatePlayListVideosComponent extends Component
{

    use LivewireAlert;
    public $intendeds = [];

    public $formSubmitted = false;
    public $databaseDataValid = false;

    public $intendedsValid = false;

    public function mount()
    {
        $this->intendeds = [
            ['title' => ''],
        ];
    }

    //add Intended
    public function addVideoLink()
    {
        $this->intendeds[] = ['title' => ''];
    }

    // remove Intended
    public function removeVideoLink($index)
    {
        unset($this->intendeds[$index]);
        $this->intendeds = array_values($this->intendeds);
    }

    public function render()
    {
        return view('livewire.backend.playlists.create-play-list-videos-component');
    }
}
