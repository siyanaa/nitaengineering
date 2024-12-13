<x-update-pass-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Change Password') }}
        </h2>
        <a href="{{ route('admin.index') }}">
            <x-jet-button>
                {{ __('Back') }}
            </x-jet-button>
        </a>
    </x-slot>

    <div>
        @livewire('profile.update-password-form')
    </div>
    

</x-update-pass-layout>