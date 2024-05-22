<x-app-layout>
    @if (count($assigned) == 0)
        <x-mary-header title="No tienes juegos disponibles" size="text-3xl opacity-50" with-anchor />
    @elseif($assigned->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-5">
            @foreach ($assigned as $assign)
                @foreach ($games as $game)
                    @if ($assign->game_id == $game->id)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden p-5 flex flex-col gap-5">
                            <h1 class="text-xl"> Nombre del juego: {{ $game->name_game }}</h1>
                            <a class="text-xl text-right text-green-500" href="{{ $game->game_path }}">Play</a>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    @endif
</x-app-layout>
