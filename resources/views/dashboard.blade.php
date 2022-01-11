<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{route('search')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Filtrar" >
                <button type="submit">Buscar</button>
            </form>
        </h2>
    </x-slot>


    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('status'))
                        <div class="alert alert-success">
                        {{ session('status') }}
                        </div>
                    @endif
                    Bem vindo {{auth()->user()->name}} <br><br>
                    @forelse ($posts as $post)

                        @can('view_post', $post)
                        <b>{{$post->title}}</b>
                        <p>{{$post->description}}</p>
                        <p>Autor:{{$post->user->name}}</p>
                        @can('edit_post',$post)
                        <a href="{{url("/post/$post->id/update")}}">Editar</a>
                        @endcan
                        @endcan
                        <hr>

                    @empty
                    <p>Nenhum post</p>

                    @endforelse

                </div>

                </div><br>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
