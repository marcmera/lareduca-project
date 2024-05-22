<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="border-b-2 border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Asignación de Usuarios</h1>
        </div>

        @if ($users->isEmpty())
            <p class="text-gray-600">No hay usuarios disponibles.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($users as $user)
                            <tr class="table-rows">

                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->username }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('assign-users', ['id' => $id_juego]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        @if ($assigned->isEmpty())
                                            <button type="submit" class="text-blue-600 hover:underline"
                                                value="{{ $user->id }}">Asignar</button>
                                        @else
                                            @foreach ($assigned as $assign)
                                                @if ($assign->student_id == $user->id)
                                                    <button type="submit" class="text-gray-400 cursor-not-allowed"
                                                    disabled>Asignado</button>
                                                @else
                                                    <button type="submit" class="text-blue-600 hover:underline"
                                                    value="{{ $user->id }}">Asignar</button>
                                                @endif
                                            @endforeach
                                        @endif


                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-8 flex justify-between">
            <a href="{{ route('psycho.games.games.index') }}"
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>
