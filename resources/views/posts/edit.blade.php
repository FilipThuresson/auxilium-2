<x-app-layout>

    <x-slot name="head">
        <script src="https://cdn.tiny.cloud/1/{{ config('app.tinymce_token') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        @vite('resources/js/editor.js')
    </x-slot>

    <form method="post" action="{{ route('posts.update', (!is_null($post) && $post->exists ? $post->id : 'new')) }}">
        @csrf
        @method('post')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-2xl flex justify-between">
                        <h2>{{ __("Skapa en tråd") }}</h2>
                        <span class="text-sm">
                            <input type="submit" name="save" class="btn bg-green-600 text-white" value="{{ __('Spara') }}" />
                            <input type="submit" name="save_close" class="btn bg-green-600 text-white" value="{{ __('Spara & stäng') }}"/>
                            <a href="{{ url()->previous() }}" class="btn text-base bg-slate-600 text-white" >{{ __('Tillbaka') }}</a>
                        </span>
                    </div>
                    <hr>
                    <div class="p-6 text-gray-900">
                        <div class="flex gap-6">
                            <div>
                                <x-input-label for="title" :value="__('Titel')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', !is_null($post) ? $post->title : '')" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                        </div>
                        <div class="py-6">
                            <textarea name="content" id="content">
                                {{ (!is_null($post) && $post->exists ? $post->content : '') }}
                            </textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
