<div>
    <h1 class="mb-6 font-bold text-2xl text-gray-900">Video Details</h1>
    <form wire:submit.prevent="submit">
        <div
            x-data="{ isUploading: false, progress: 0, success: false }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false; success = true"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
        >
            <div x-show="!success">
                <!-- File Input -->
                <input type="file" wire:model="video">

                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>

                <x-jet-input-error for="video" class="mt-2"/>
            </div>

            <div x-show="success">

                <h3 class="font-medium text-xl my-4">Fill the form to complete the process.</h3>

                <div class="mt-6">
                    <x-jet-label for="title" value="{{ __('Title') }}"/>
                    <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title"
                                 autocomplete="title"/>
                    <x-jet-input-error for="title" class="mt-2"/>
                </div>

                <div class="mt-8 text-right">
                    <x-jet-button>Save</x-jet-button>
                </div>
            </div>

        </div>

    </form>
</div>
