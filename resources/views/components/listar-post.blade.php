<div>
    {{-- {{ $title }} --}}
    @foreach ($posts as $post)
            <div class="my-3  shadow-2xl p-5 rounded-xl">
                <a href="{{ route('posts.show', ["user" => $post->user, "post" => $post]) }}" class=" image">
                    <img src="{{asset('uploads') . "/" . $post->image }}" alt="" class="image object-cover rounded-lg">
                </a>
                <div class="py-3 flex gap-4">
                    <span class="font-bold text-sm">{{ $post->likes->count() }} Likes</span>
                    <span class="font-bold text-sm">{{ $post->comments->count() }} comentarios</span>
                </div>
            </div>
        @endforeach
</div>
