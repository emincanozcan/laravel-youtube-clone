<?php

namespace App\Http\Livewire\Studio;

use Livewire\Component;

class VideosTable extends Component
{
    public $videos;

    public function mount()
    {
        $this->videos = auth()->user()->channel->videos()->orderByDesc('updated_at')->get();
    }

    public function render()
    {
        return view('livewire.studio.videos-table');
    }
}
