<x-app-layout>
    <div class="flex items-center justify-between flex-col ">

        <livewire:student-data />
        @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 4 || Auth::user()->role_id == 3)
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @endif


            {{--  @livewire('profile.logout-other-browser-sessions-form') --}}
        @endif
    </div>

</x-app-layout>
