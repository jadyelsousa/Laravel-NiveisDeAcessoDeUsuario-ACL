<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestão de usuários') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('envcardpermission') }}">
                    @csrf

                    @forelse ($users as $user)

                        <p>Usuário:
                            <label for="" name="user" >{{$user->name}}</label>
                        </p>

                        <p>Permissões:</p>
                        <p></p>

                        @foreach ($roles as $role)
                        <div class="block mt-4">
                            <label class="inline-flex items-center">
                                <input id="{{$role->id}}" value="{{$role->id}}" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="check_role[{{$user->id}}][]" {{ $user->roles->contains($role) ? "checked" : "" }}>
                                <span class="ml-2 text-sm text-gray-600">{{$role->name}}</span>
                            </label>
                        </div>

                        @endforeach
                        <hr>

                    @empty
                    <p>Nenhum Usuário</p>

                    @endforelse

                    <div class="flex items-center justify-end mt-4">
                        <a class="ml-4" href="{{ route('dashboard') }}">
                            {{ __('Voltar') }}
                        </a>
                        <x-button class="ml-4">
                            {{ __('Salvar') }}
                        </x-button>
                    </div>
                </form>
                </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
