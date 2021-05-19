<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateChannelForm extends Component
{
    use WithFileUploads;

    public $channel;
    public $photo;
    public $name;

    public function mount()
    {
        $this->channel = auth()->user()->channel;
        $this->name = $this->channel->name;
    }

    public function deletePhoto()
    {
        $this->removePhotoFromFileSystemIfExists();
        $this->channel->channel_photo_path = null;
        $this->channel->save();
        return redirect()->route('profile.show');
    }

    public function updateChannel()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|file|max:1024|mimes:jpg,bmp,png'
        ]);

        $updateData = ['name' => $this->name,];

        if ($this->photo) {
            $this->removePhotoFromFileSystemIfExists();
            $updateData['channel_photo_path'] = $this->photo->store('channel-photos', 'public');
        }

        $this->channel->update($updateData);

        return redirect()->route('profile.show');
    }

    protected function removePhotoFromFileSystemIfExists()
    {
        if ($this->channel->channel_photo_path) {
            Storage::disk('public')->delete($this->channel->channel_photo_path);
        }
    }

    public function render()
    {
        return view('profile.update-channel-form');
    }
}
