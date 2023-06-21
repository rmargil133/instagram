<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imagenes') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach($images as $image)
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div style="display:inline-block; margin-left:0px">
                    <img src="{{ $image->user->avatar }}" alt="" style="display:inline-block; width:50px;">
                        <span class="font-semibold title-font text-white">{{$image->user->name}}</span>
                        <span class="font-semibold title-font text-white">  |  </span>
                        <span class="font-semibold title-font text-white-900">{{'@'}}{{$image->user->nick}}</span>
                    </div>
                    <div style="margin-top:50px">
                        <img class="leading-relaxed" src="{{ $image->image_path }}">
                        <p class="font-semibold title-font text-white-900">{{'@'}}{{$image->user->nick}}|{{$image->updated_at}}</p>
                        <p class="font-semibold title-font text-white">{{$image->description}}</p>
                    </div>
                    <div style="display:inline-block;">
                        <div style="display:inline-block;">
                            <a href="{{ route("images.show", $image) }}">
                                <svg style="display:inline-block; width: 30px; heigth: 30px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </a>

                        </div>
                        <span class="font-semibold title-font text-white">{{$image->comment_count}} Comentarios</span>
                        <span class="font-semibold title-font text-white">{{$image->like_count}} Likes</span>
                    </div>
                </div>
                @endforeach
                {{ $images->links() }}
            </div>
        </div>
    </section>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
