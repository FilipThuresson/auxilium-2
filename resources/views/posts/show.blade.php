<x-app-layout>
    <x-slot name="head">
        <script src="https://cdn.tiny.cloud/1/{{ config('app.tinymce_token') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        @vite('resources/js/editor.js')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-2xl flex justify-between items-center">
                    <span>
                        <h2>{{ $post->title }}</h2>
                        <p class="text-sm">{{ $post->user->name }} | {{ $post->created_at }}</p>
                    </span>
                    <span class="text-sm">
                        <x-primary-link href="{{ url()->previous() }}">
                            {{ __('Tillbaka') }}
                        </x-primary-link>
                    </span>
                </div>
                <hr>
                <div class="p-6">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-2xl">
                    <span class="flex justify-between items-center">
                        <h2>{{ __('Svar') }}</h2>
                        <x-primary-button
                            data-te-collapse-init
                            data-te-ripple-init
                            data-te-ripple-color="light"
                            data-te-target="#newComment"
                            aria-expanded="false"
                            aria-controls="newComment"
                        >
                            {{ __('Svara på tråden') }}
                        </x-primary-button>
                    </span>
                    <div class="!visible hidden py-6" id="newComment" data-te-collapse-item>
                        <form action="{{ route('comments.update', 'new') }}" method="POST">
                            @csrf
                            @method('post')

                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <textarea name="content"></textarea>
                            <button class="btn bg-green-500 text-white text-base mt-6" type="submit">{{ __('Spara') }}</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="p-6">
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
