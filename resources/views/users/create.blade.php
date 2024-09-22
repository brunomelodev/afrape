<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Adicionar Usuário' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">






                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Cadastrar Usuário
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Cadastrar um novo Usuário
                            </p>
                        </header>




                        <form method="post" action="{{ route('users.store') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')
                            <div>
                                <x-input-label for="name" value="Nome" />
                                <x-text-input class="mt-1 block w-full"
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name') }}"
                                    required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" value="Email" />
                                <x-text-input class="mt-1 block w-full"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-input-label for="level" value="Nivel de Acesso" />
                                <x-select-input class="mt-1 block w-full"
                                    id="level"
                                    name="level">
                                    @foreach ($options as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div>
                                <x-input-label for="password" value="Senha" />
                                <x-text-input class="block mt-1 w-full"
                                    id="password"
                                    name="password"
                                    type="password"
                                    required autocomplete="new-password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" value="Confirmar Senha" />
                                <x-text-input class="block mt-1 w-full"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required autocomplete="new-password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                            </div>


                            <div class="flex items-center gap-4">
                                <x-primary-button>Salvar</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>






                </div>
            </div>
        </div>
    </div>

</x-app-layout>