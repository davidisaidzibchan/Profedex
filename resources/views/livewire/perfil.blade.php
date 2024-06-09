<div class="w-full flex" style="height: calc(100vh - 3.5rem)">
    <div class="md:hidden w-full h-full flex flex-col bg-white relative">
        <div
            class="bg-amber-500 w-full select-none h-72 p-5 text-white font-semibold rounded-b-xl flex flex-col gap-1 justify-start items-center relative">
            <div class="absolute top-0 left-0 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" onclick="window.history.back()" fill="none" viewBox="0 0 24 24"
                    stroke-width="3" stroke="currentColor"
                    class="w-10 h-10 hover:bg-stone-400 active:bg-stone-500 cursor-pointer rounded-full p-2 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </div>
            <div class="w-28 h-28 relative">
                @if ($userAuth->avatar_path)
                    <img src="{{ asset('storage/' . $userAuth->avatar_path) }}" alt="imagen"
                        class="w-full h-full rounded-full object-cover object-center" />
                @else
                    <img src="/img/cow.png" alt="imagen"
                        class="w-full h-full rounded-full object-cover object-center" />
                @endif

                <div id="editAvatar" wire:click="mostrarOverlay()"
                    class="absolute bottom-0 right-0 bg-stone-700 p-1 rounded-full border-4 border-stone-500 cursor-pointer hover:bg-stone-400 active:bg-stone-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 text-stone-500">
                        <path
                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>
                </div>
            </div>
            <div class="text-xl text-center">{{ $userAuth->username }}</div>
            <div class="text-xs text-center">{{ $userAuth->name }}</div>
            <div class="absolute bottom-0 h-20 w-full flex justify-center items-center">
                <div class="h-full flex justify-between items-center gap-3">
                    <div class="text-center">
                        <h1 class="text-xs">Total de me gusta</h1>
                        <div class="font-bold text-lg">{{ $numeroReacciones }}</div>
                    </div>
                    <div class="h-2/3 border"></div>
                    <div class="text-center">
                        <h1 class="text-xs text-center">Total de consejos</h1>
                        <div class="font-bold text-lg">{{ $numConsejos }}</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full flex flex-col items-center justify-center p-4">
            <div
                class="w-full flex justify-between items-center hover:bg-stone-300 cursor-pointer select-none active:bg-stone-400 rounded-xl p-2">
                <div class="flex gap-3 justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>

                    <div class="text-md font-semibold">Editar datos</div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>

            </div>
        </div>

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div
                class="absolute bottom-0 left-1/2 transform -translate-x-1/2  mb-2 flex gap-2 hover:bg-stone-300 active:bg-stone-400 p-3 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M12 2.25a.75.75 0 0 1 .75.75v9a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM6.166 5.106a.75.75 0 0 1 0 1.06 8.25 8.25 0 1 0 11.668 0 .75.75 0 1 1 1.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 0 1 1.06 0Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="font-bold">Cerrar sesion</div>
            </div>
        </a>

        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>


        <script>
            function logoutAndRedirect() {
                document.getElementById('logout-form').submit();
                window.location.href = '{{ route('welcome') }}'; // Cambia 'home' por el nombre de tu ruta principal
            }
        </script>
    </div>
    <div class="w-1/3 h-full hidden md:flex flex-col bg-amber-500  relative">
        <div
            class="bg-amber-500 w-full select-none  p-5 font-semibold rounded-b-xl flex flex-col gap-1 justify-start items-center relative">
            <div class="absolute top-0 left-0 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" onclick="window.history.back()" fill="none"
                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                    class="w-10 h-10 hover:bg-stone-400 active:bg-stone-500 cursor-pointer rounded-full p-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </div>
            <div class="w-44 h-44 relative">
                @if ($userAuth->avatar_path)
                    <img src="{{ asset('storage/' . $userAuth->avatar_path) }}" alt="imagen"
                        class="w-full h-full rounded-full object-cover object-center" />
                @else
                    <div class="h-28">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                @endif

                <div id="editAvatar" wire:click="mostrarOverlay()"
                    class="absolute bottom-0 right-0 bg-stone-700 p-1 rounded-full border-4 border-stone-500 cursor-pointer hover:bg-stone-400 active:bg-stone-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 text-stone-500">
                        <path
                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-extrabold text-center">{{ $userAuth->username }}</div>
            <div class="text-base text-center">{{ $userAuth->name }}</div>
            <div class="bottom-0 h-20 w-full flex justify-center items-center">
                <div class="h-full flex justify-between items-center gap-3">
                    <div class="text-center">
                        <h1 class="text-xs">Total de me gusta</h1>
                        <div class="font-bold text-lg">{{ $numeroReacciones }}</div>
                    </div>
                    <div class="h-2/3 border"></div>
                    <div class="text-center">
                        <h1 class="text-xs text-center">Total de consejos</h1>
                        <div class="font-bold text-lg">{{ $numConsejos }}</div>
                    </div>
                </div>
            </div>

        </div>


        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2  flex flex-col items-center justify-center">
            <div class="w-full flex flex-col items-center justify-center p-4">
                <div
                    class="w-full flex justify-between items-center hover:bg-stone-300 cursor-pointer select-none active:bg-stone-400 rounded-xl p-2">
                    <div class="flex gap-3 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                        </svg>

                        <div class="text-md font-semibold">Editar datos</div>
                    </div>

                </div>
            </div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div
                    class="mb-2 flex gap-2 text-white justify-center items-center bg-red-800 hover:bg-red-700 active:bg-red-600 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 0 1 .75.75v9a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM6.166 5.106a.75.75 0 0 1 0 1.06 8.25 8.25 0 1 0 11.668 0 .75.75 0 1 1 1.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="font-bold">Cerrar sesion</div>
                </div>
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>
        <script>
            function logoutAndRedirect() {
                document.getElementById('logout-form').submit();
                window.location.href = '{{ route('welcome') }}'; // Cambia 'home' por el nombre de tu ruta principal
            }
        </script>
    </div>
    <div class="w-2/3 hidden md:flex flex-col gap-3 justify-center items-center p-10">
        <div class="w-2/3">
            <h1 class="text-4xl font-extrabold text-amber-500">Terminos y Condiciones de uso.</h1>
            <p class="text-white text-lg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                malesuada arcu sit amet bibendum sodales. Morbi pretium lacus ac eros porttitor, eget luctus risus
                laoreet. Donec purus dolor, cursus non tellus vel, fringilla iaculis enim. Mauris quis vestibulum nulla.
                Nulla sodales pharetra rutrum. Cras volutpat lectus ac velit cursus, egestas cursus dui aliquam. In
                consectetur, ligula id accumsan viverra, tortor enim elementum quam, laoreet varius leo tortor eget
                tellus. Aliquam non ex lorem.
                Nam ut molestie sapien, tempus tempus nulla. Nunc ultricies vel turpis a elementum. Vestibulum eros
                nunc, pulvinar eu purus in, tincidunt commodo ligula. Maecenas et mauris id nibh tempor congue non at
                augue. Ut porttitor ipsum nec massa molestie, cursus sollicitudin dolor accumsan. Etiam efficitur,
                ligula a gravida commodo, enim nisl molestie sem, porta posuere elit erat ut urna. Aliquam consequat leo
                vitae enim egestas, vel lobortis odio convallis. Sed nulla purus, semper non gravida nec, blandit in
                magna. Aliquam felis orci, cursus ac arcu at, accumsan mattis quam. Aenean aliquam consectetur velit
                tristique venenatis.
            </p>
        </div>
    </div>

    @if ($openOverlay)
        <div id="overlay"
            class="overlay fixed top-0 left-0 w-full h-full md:bg-black/50 bg-teal-500 p-5 z-50 flex justify-center overflow-scroll items-start">
            <div
                class="bg-amber-500 mt-16 md:w-1/3 w-full min-h-44 p-5 md:rounded-none rounded-xl md:px-16 flex md:justify-center md:items-center  flex-col gap-5 relative">
                <div class="w-full text-center mb-5 text-xl font-extrabold">ELIGE TU AVATAR</div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute top-2 right-4 h-8 w-8 cursor-pointer" wire:click="ocultarOverlay()">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                  </svg>
                  
                <div class="md:w-full md:bg-amber-600 md:p-5">
                    @php
                        $groupedAvatars = collect($avatars)->groupBy(function ($avatar) {
                            return explode('_', basename($avatar))[0];
                        });
                    @endphp
                    @foreach ($groupedAvatars as $prefijo => $avatarsPorPrefijo)
                        <div class="flex flex-col">
                            <h2 class="text-left capitalize text-lg font-extrabold">{{ $prefijo }}</h2>
                            <div class="flex flex-wrap justify-start">
                                @foreach ($avatarsPorPrefijo as $avatar)
                                    <div class="md:w-28 w-1/3 p-2">
                                        <img src="{{ asset('storage/' . $avatar) }}" alt="{{ $avatar }}"
                                            class="w-full h-full cursor-pointer"
                                            wire:click="seleccionarImagen('{{ $avatar }}')">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
