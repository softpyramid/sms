<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Update Student Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your student information and other details.') }}
            <!--start temporarily display information -->
            <div class="col-span-6 sm:col-span-4">
                <b>School : {{ $school->name }}</b><br>
                <b><i>Branch : {{ $branch->name }}</i></b>
            </div>
           <!--end temporarily display information -->
        </x-slot>

        <x-slot name="form">
            <!-- Form Fields -->
            <div class="col-span-6 sm:col-span-4">
                {{ $this->form }}
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
