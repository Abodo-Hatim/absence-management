<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifier Les Informations  D\'Un Formateur') }}
        </h2>
    </x-slot>
    <div class="container mx-auto my-10">

        <button class='inline-flex items-center justify-center px-1 py-2 md:px-3 md:py-2 mb-4  bg-gray-800 dark:text-gray-200 dark:border-gray-400 border border-transparent rounded-lg text-white tracking-widest hover:text-gray-200 dark:hover:text-gray-800 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
            <a class="flex items-center" href="{{ route('admin.formateurs') }}">Retourner</a>
        </button>

        <form action="{{ route('admin.updateFormateur', $formateur->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="">

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <!-- Nom -->
                    <div class="">
                        <x-input-label for="nom" :value="__('Nom')" />
                        <x-text-input id="nom" class="mt-1 block w-full" type="text" name="nom"
                            value="{{ $formateur->nom }}" required autofocus autocomplete="nom" />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>

                    <!-- Prenom -->
                    <div class="">
                        <x-input-label for="prenom" :value="__('Prenom')" />
                        <x-text-input id="prenom" class="mt-1 block w-full" type="text" name="prenom"
                            value="{{ $formateur->prenom }}" required autofocus autocomplete="prenom" />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                    </div>
                </div>
                <!-- email -->
                <div class="col-span-2 inline">
                    <x-input-label for="email" :value="__('email')" />
                    <x-text-input id="email" class="mt-1 block w-full" type="text" name="email"
                        value="{{ $formateur->email }}" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- password -->
                <div class="col-span-2 inline">
                    <x-input-label for="password" :value="__('password')" />
                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                        autofocus autocomplete="password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-8">
                    <div class="mt-8">
                        <input type="submit" class="font-medium bg-gray-800 text-slate-100 px-5 py-2 rounded-lg mr-6 hover:bg-slate-900   dark:text-gray-200 " value="Modifier">
                        <input type="reset" class="font-medium bg-gray-600 text-slate-100 px-5 py-2 rounded-lg dark:bg-gray-800 hover:bg-slate-800 hover:text-gray-200  " value="Annuler">
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
