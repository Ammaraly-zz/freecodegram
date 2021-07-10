<x-layout>
    @foreach ($posts as $post)
        <article>
            {!! $post !!}
        </article>
    @endforeach
</x-layout>
