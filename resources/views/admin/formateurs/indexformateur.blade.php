<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Les Formateurs') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="mt-6">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Recherche</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class=" w-5 h-5 text-gray-500 dark:text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="searchInput"  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Formateur, Nom..." required>
                <button disabled class="hidden text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:inline ">Search</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table
                class="my-8 min-w-full table-auto divide-y divide-gray-200 px-2 py-1 dark:text-gray-100 md:px-6 md:py-3">
                <thead>
                    <tr>
                        <th scope="col"
                            class="dark:bg-gray-950 px-0 py-2 text-left text-xs font-bold uppercase tracking-wider text-gray-800 dark:text-gray-50 md:px-6 md:py-3">
                            # Id</th>
                        <th scope="col"
                            class="dark:bg-gray-950 px-0 py-2 text-left text-xs font-bold uppercase tracking-wider text-gray-800 dark:text-gray-50 md:px-6 md:py-3">
                            Nom</th>
                        <th scope="col"
                            class="dark:bg-gray-950 px-0 py-2 text-left text-xs font-bold uppercase tracking-wider text-gray-800 dark:text-gray-50 md:px-6 md:py-3">
                            Prenom</th>
                        <th scope="col"
                            class="dark:bg-gray-950 px-0 py-2 text-left text-xs font-bold uppercase tracking-wider text-gray-800 dark:text-gray-50 md:px-6 md:py-3">
                            Email</th>
                        <th scope="col"
                            class="dark:bg-gray-950 px-0 py-2 text-left text-xs font-bold uppercase tracking-wider text-gray-800 dark:text-gray-50 md:px-6 md:py-3">
                            Operation</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200 bg-white dark:text-gray-100">
                    @foreach ($formateurs as $formateur)
                        <tr>
                            <td
                                class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-4 md:py-1">
                                {{ $formateur->id }}</td>
                            <td
                                class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                                {{ $formateur->nom }}</td>
                            <td
                                class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                                {{ $formateur->prenom }}</td>
                            <td
                                class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                                {{ $formateur->email }}</td>
                            <td
                                class="whitespace-nowrap px-3 py-2 text-lg font-medium dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                                <div class="flex space-y-2 flex-row md:space-y-0 md:space-x-4">

                                    <!-- show -->

                                    <a class="text-lg mt-2 md:mt-0" href="{{ route('admin.showFormateur', $formateur->id) }}">
                                    <div class="w-full  bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto " title="details de stagiaire">
                                            <i class="fa-regular fa-eye"></i>
                                        </div>
                                    </a>

                                    <!-- update -->
                                    <a class="text-lg" href="{{ route('admin.editFormateur', $formateur->id) }}">
                                    <div class="w-full bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto" title="modifier les information de stagiaire">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </div>
                                    </a>

                                    <!-- delete -->
                                    <form action="{{ route('admin.destroyFormateur', $formateur->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="w-full bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto" title="supprimer ce stagiaire">
                                            <button type=""submit" class="text-lg">
                                                <i class="fa-regular fa-trash-can "></i>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="dark my-4">
            {{ $formateurs->links() }}
        </div>

    </div>

</x-app-layout>
<script>
    var data = {!! $data !!};
    var input = document.getElementById("searchInput");
    input.onkeydown = function () {
        var formateurs =  ``;
        var inputValue = input.value.toLowerCase();
        for (var i = 0; i < data.length; i++) {
            if(data[i].nom.toLowerCase().includes(inputValue) || data[i].prenom.toLowerCase().includes(inputValue) || data[i].email.toLowerCase().includes(inputValue)){
                idFormateur = data[i].id;
                formateurs += 
                `
                <tr>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-4 md:py-1">${data[i].id}</td>
                    <td class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">${data[i].nom}</td>
                    <td class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                    ${data[i].prenom}</td>
                    <td class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-900 dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                    ${data[i].email}</td>
                    <td class="whitespace-nowrap px-3 py-2 text-lg font-medium dark:bg-gray-800 dark:text-gray-100 md:px-2 md:py-1">
                        <div class="flex space-y-2 flex-row md:space-y-0 md:space-x-4">
                            <a class="text-lg mt-2 md:mt-0" href="/admin/formateur/show/${idFormateur}">
                                <div class="w-full  bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto " title="details de stagiaire">
                                    <i class="fa-regular fa-eye"></i>
                                </div>
                            </a>
                            <a class="text-lg" href="/admin/formateur/${idFormateur}/edit">
                                <div class="w-full bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto" title="modifier les information de stagiaire">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </div>
                            </a>
                            <form action="/admin/formateur/${idFormateur}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="w-full bg-slate-50 rounded-lg text-center items-center px-4 py-2 text-slate-700 hover:bg-slate-300 hover:text-slate-500 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-600 dark:hover:text-slate-300 md:w-auto" title="supprimer ce stagiaire">
                                    <button type=""submit" class="text-lg">
                                        <i class="fa-regular fa-trash-can "></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            `;
            document.getElementById('tbody').innerHTML = formateurs;
            }
        }
    }

</script>
