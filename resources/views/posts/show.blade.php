@props(['post'])
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 pt-10">
                <div class="col-span-4 text-center">
                    <img src="/images/illustration-1.png" alt="" class="rounded" />
                    <p class="mt-4 block text-gray-300 text-xs">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>
                    <div class="flex items-center justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar" />
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?authors={{ $post->author->username }}">
                                    {{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="flex justify-between mb-6 -mt-10">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg class="mr-2" width="22" height="22" viewBox="0 0 22 22">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts</a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category" />
                        </div>
                    </div>
                    <h1 class="font-bold text-4xl mb-10">
                        {{ $post->title }} </h1>

                    <div class="space-y-4 text-lg">
                        {!! $post->body !!} </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @include('posts._add-comment-form')
                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach
                </section>
            </article>
        </main>
    </section>
</x-layout>
