<div class=" bg-white mx-auto w-full h-full max-w-xl p-8 mt-10 mb-18 border border-green-400 ">
    <h1 class="text-3xl font-bold text-center  text-black">{{ Auth::user()->username }}

        <div class="flex justify-center">
            <img class=" mt-5 w-48 h-48 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                alt="{{ Auth::user()->username }}" />
        </div>
        <h1 class="text-3xl font-bold my-3 text-black">Información personal</h1>
        <p class=" mb-2 text-black">Nombre: {{ Auth::user()->username }}</p>
        <p class=" mb-2 text-black">Rol: {{ Auth::user()->role->role_type }}</p>
        <p class=" mb-2 text-black">Email: {{ Auth::user()->email }}</p>
</div>
