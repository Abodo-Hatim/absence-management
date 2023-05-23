<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __("classe $classe->id") }}
        </h2>
    </x-slot>
    <div class="container mx-auto  mt-10 px-4">
        <button class='inline-flex items-center justify-center px-1 py-2 md:px-3 md:py-2 mb-4  bg-gray-800 dark:text-gray-200 dark:border-gray-400 border border-transparent rounded-lg text-white tracking-widest hover:text-gray-100 dark:hover:text-gray-800 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
            <a href="{{route('admin.allClasses')}}">Retourner</a>
        </button>

        <div class="w-full rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
            <div class="flex justify-between items-center">

                <p class="  text-center  text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $classe->branche }} {{ $classe->num_group }}
                </p>

                <div class="flex flex-row gap-4">

                <!-- update -->
                <a class="text-lg" href="{{ route('admin.editClasse', $classe->id) }}">
                    <div class="w-full bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto" title="modifier les information de stagiaire">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>
                </a>

                <!-- delete -->
                <form action="{{ route('admin.destroyClasse', $classe->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div
                    class="w-full bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto" title="supprimer ce stagiaire">
                        <button type="submit" class="text-lg">
                            <i class="fa-regular fa-trash-can "></i>
                        </button>
                    </div>
                </form>
            </div>
            </div>
            <div>
                <p class="mb-3 text-md font-medium text-gray-900 dark:text-gray-400">

                </p>
                <p class="mb-3 text-md font-medium text-gray-900 dark:text-gray-400">
                    Annee Scolaire : {{ $classe->annee_scolaire }}
                </p>
                <p class="mb-3 text-md font-medium text-gray-900 dark:text-gray-400">
                Totale D'absence: {{ $totalAbsences }}
                </p>
            </div>


            <h5 class="my-4  text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Les Stagiaire Dans La Classe :</h5>
            <div class="overflow-x-auto my-4">
                <table class="w-full my-5  text-md text-left text-gray-900 dark:text-gray-300">
                    <thead class="text-gray-900 uppercase bg-gray-200  dark:bg-gray-700 dark:text-gray-400">
                        <tr class="font-bold">
                            <th  scope="col" class="text-center px-6 py-1">N°</th>
                            <th  scope="col" class="px-6 py-1">Nom</th>
                            <th  scope="col" class="px-6 py-1">Prenom</th>
                            <th  scope="col" class="px-6 py-1">number D'absente</th>
                            <th  scope="col" class="px-6 py-1 hidden md:table-cell">absente son preuve</th>
                            <th  scope="col" class="px-6 py-1 hidden md:table-cell">absente avec preuve</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        @foreach ($stagiaires as $key => $stagiaire)
                        <tr>
                            <td class="whitespace-nowrap px-3 py-2 text-md font-medium text-gray-900 dark:bg-gray-800 text-center dark:text-gray-100 md:px-2 md:py-1">{{ $stagiaire->id}}</td>
                            <td class="whitespace-nowrap px-3 py-2 text-md font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">{{$stagiaire->nom}}</td>
                            <td class="whitespace-nowrap px-3 py-2 text-md font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">{{$stagiaire->prenom}}</td>
                            <td class="pl-24">{{ $stagiaire->absencesCount }}</td>
                            <td class="hidden md:table-cell pl-24">{{$stagiaire->absenceSonPreuv}}</td>
                            <td class="hidden md:table-cell pl-24">{{$stagiaire->absenceAvecPreuv}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $stagiaires->links() }}
            </div>



        </div>

        {{-- <div class="rounded-lg bg-white">
            <div class="m-5">

                <i class="fa-solid fa-user fa-2xl inline"></i>
                <span class="text-2xl"># id {{ $formateur->id }}</span>
                <h2 class="my-6 text-lg">nom & prenom : {{ $formateur->nom }} {{ $formateur->prenom }}</h2>
                <h2 class="text-lg">email : {{ $formateur->email }} </h2>

                <div class="my-6 mx-6 mb-6 flex flex-row gap-4">
                    <x-primary-button
                        class="text-slate-950 inline w-24 bg-slate-300 px-2 py-1 hover:bg-slate-400 dark:bg-slate-700 dark:text-white md:w-auto">
                        <a href="{{ route('admin.editFormateur', $formateur->id) }}" class="inline"><i
                                class="fa-regular fa-pen-to-square fa-2xl"></i></a>
                    </x-primary-button>

                    <!-- delete -->
                    <form action="{{ route('admin.destroyFormateur', $formateur->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-primary-button
                            class="text-slate-950 inline w-full bg-slate-300 px-2 py-1 hover:bg-slate-400 dark:bg-slate-700 dark:text-white md:w-auto">
                            <a class="inline h-full w-full"><i class="fa-solid fa-trash-can fa-2xl"></i></a>
                        </x-primary-button>
                    </form>
                </div>

            </div>
        </div> --}}

    </div>

</x-app-layout>