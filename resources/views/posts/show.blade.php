<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-2xl flex justify-between items-center">
                    <span>
                        <h2>{{ $post->title }}</h2>
                        <p class="text-sm">{{ $post->user->name }} | {{ $post->created_at }}</p>
                    </span>
                    <span class="text-sm">
                        <a href="{{ url()->previous() }}" class="btn bg-slate-600 text-white" >
                            {{ __('Tillbaka') }}
                        </a>
                    </span>
                </div>
                <hr>
                <div class="p-6">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
