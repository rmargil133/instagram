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
                    <a href="{{ route("images.show", $image) }}">
                            <img class="leading-relaxed" src="{{ $image->image_path }}">
                            </a>
                        <p class="font-semibold title-font text-white-900">{{'@'}}{{$image->user->nick}}|{{$image->updated_at}}</p>
                        <p class="font-semibold title-font text-white">{{$image->description}}</p>
                    </div>
                    <div style="display:inline-block; margin-left:20px">
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
