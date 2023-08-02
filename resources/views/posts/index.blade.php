<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-2xl flex justify-between items-center">
                    <h2>{{ __("Dina trådar") }}</h2>
                    <span class="text-sm">
                        <a href="{{ route('posts.edit', 'new') }}" class="btn bg-green-600 text-white" >
                            {{ __('Ny tråd') }}
                        </a>
                    </span>
                </div>
                <hr>
                <div class="p-6">
                    <x-table>
                        <x-slot name="header">
                            <x-table-column>{{ __('Skapad') }}</x-table-column>
                            <x-table-column>{{ __('Title') }}</x-table-column>
                            <x-table-column>{{ __('Svar') }}</x-table-column>
                            <x-table-column>{{ __('Visningar') }}</x-table-column>
                            <x-table-column>{{ __('') }}</x-table-column>
                        </x-slot>
@foreach ($posts as $post)
                            <tr>
                                <x-table-column>{{$post->created_at}}</x-table-column>
                                <x-table-column>{{$post->title}}</x-table-column>
                                <x-table-column>{{ __('124 st') }}</x-table-column>
                                <x-table-column>{{ sprintf('%d st', count($post->views)) }}</x-table-column>
                                <x-table-column>
                                    <span class="flex gap-2 items-center justify-evenly">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500"><i class="fa-solid fa-pen"></i></a>
                                        <a href="{{ route('posts.show', $post->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <form method="post" action="{{ route('posts.trash', $post->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-600"><i class="fa-solid fa-trash"></i>
                                        </form>
                                    </span>
                                </x-table-column>
                            </tr>
@endforeach
                    </x-table>
                    <div class="py-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
