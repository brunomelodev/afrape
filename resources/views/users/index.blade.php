<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Usuários' }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <section>
                        <header>
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ 'Listagem de Usuários' }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ 'Listando todos os usuários cadastrados' }}
                                </p>
                            </div>

                            <div class="py-1 mb-4 mt-4">
                                <a href="{{ route('users.create') }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-plus" aria-hidden="true"></i> Cadastrar
                                </a>
                            </div>
                        </header>





                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Nome:</th>
                                        <th scope="col" class="px-6 py-4">E-mail</th>
                                        <th scope="col" class="px-6 py-4">Nivel</th>
                                        <th scope="col" class="px-6 py-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">{{ $user->level ? 'Administrador' : 'Usuário' }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100">Nenhum registro encontrado</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                        <div class="py-4">
                            {{ $users->links() }}
                        </div>








                    </section>






                </div>
            </div>
        </div>
    </div>










</x-app-layout>