<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Detalles de la imagen') }}
        </h2>
    </x-slot>

    <div class="py-8 flex flex-wrap md:flex-nowrap">
        <div style="display:inline-block; margin-left:90px">
            <img src="{{ asset($image->user->avatar) }}" alt="" style="display:inline-block; width:50px;">
            <span class="font-semibold title-font text-white">{{$image->user->name}}</span>
            <span class="font-semibold title-font text-white">  |  </span>
            <span class="font-semibold title-font text-white">{{'@'}}{{$image->user->nick}}</span>
            
        </div>
        <div style="margin-top: 50px">
            <img class="leading-relaxed" src="{{ asset($image->image_path) }}">
            <p class="font-semibold title-font text-white">{{'@'}}{{$image->user->nick}}|{{$image->updated_at}}</p>
            <p class="font-semibold title-font text-white">{{$image->description}}</p>
            <form method="POST" action="{{ route('comments.store') }}" style="display:flex; flex-direction:column;  align-items:flex-start;" class="mt-4">
                @csrf
                <label for="description" style="font-size: 30px; font-weigth:200; color:white;">Comentarios {{$image->comment_count}}</label>
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                <textarea style="color:black; width: 1000px; height:70px; margin-top:20px" id="story" name="content" rows="5" placeholder="Que quieres comentar?" class="bg-white border rounded-sm max-w-md" required></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                <x-primary-button style="margin-top: 20px">Enviar</x-primary-button>
                <input type="hidden" name="redirect_to" value="{{ route('images.show', ['image' => $image->id]) }}">


            </form>
            @foreach($image->comment as $comment)
                <div class="font-semibold p-2.5">
                    <div class="flex flex-row flex-wrap ">
                        <div class="flex-col mt-1">
                            <div class="flex items-center flex-1 px-4 font-bold leading-tight text-white">{{'@'}}{{ $comment->user->nick}}
                                <span class="ml-2 text-xs font-normal text-gray-500"></span>
                            </div>
                            <div class="flex flex-wrap">
                                <p class="w-[640px] mt-3 ml-3 mr-3 text-white" >{{ $comment->content}}</p>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->id == $image->user_id || Auth::user()->id == $comment->user_id)
                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-comment-deletion-{{$comment->id}}')">
                        {{ __("Eliminar") }}
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </x-danger-button>
                        <x-modal name="confirm-comment-deletion-{{$comment->id}}" :show="$errors->commentDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('comments.destroy', $comment->id) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-white">¿Estás seguro de que deseas borrar este comentario?</h2>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancelar') }}
                                    </x-secondary-button>
                                    <x-danger-button class="ml-3">
                                        {{ __('Borrar comentario') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    @endif
                </div>
            @endforeach
        </div>
        <div style="display: flex; flex-direction:column; margin-left: 30px;">
            
            @if(Auth::user()->id == $image->user_id)
                <a href="{{ route("images.edit", ["image" => $image]) }}"
                class="text-indigo-500 inline-flex items-center mt-4">
                {{ __("Editar") }}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>

                </a>
                <x-danger-button style="margin-top:10px; width:100px;" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-image-deletion')">
                {{ __("Eliminar") }}
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </x-danger-button>
                <x-modal name="confirm-image-deletion" :show="$errors->imageDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('images.destroy', $image->id) }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h1 style="color:white; font-size: 30px; font-weight: 200;">¿Estás seguro?</h1>
                        <p style="color:white;">-------------------------------------------------------------------------------------</p>
                        <h2 class="text-lg font-medium text-white">Si eliminas esta imagen nunca podrás recuperarla, ¿estas seguro de querer borrarla?</h2>
                        <p style="color:white;">-------------------------------------------------------------------------------------</p>
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
                            <x-danger-button class="ml-3">
                                {{ __('Borrar imagen') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            @endif
        </div>
    </div>
</x-app-layout>