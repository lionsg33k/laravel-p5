@extends('layouts.index')

@section('content')
    {{-- Page title --}}
    <div class="py-2">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Posts</h1>
        <p class="mt-1 text-sm text-gray-500">
            Share updates — each post is created by a student
        </p>
    </div>

    {{-- Create post --}}
    <div class="mt-6 rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <div class="p-4">
            <div class="flex gap-3">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-alpha/10 text-sm font-semibold text-alpha">
                    JD
                </div>

                <div class="min-w-0 flex-1">
                    <form action="/posts" method="POST" class="space-y-3">
                        @csrf
                        <textarea name="post" rows="2" placeholder="What's on your mind?"
                            class="block w-full resize-none rounded-xl border border-gray-200 bg-gray-50/80 px-4 py-3 text-gray-900 placeholder-gray-500 focus:border-alpha focus:bg-white focus:outline-none focus:ring-1 focus:ring-alpha"></textarea>

                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-500">Post as</span>
                                <select name="student_id"
                                    class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-700 focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha">

                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit"
                                class="rounded-lg bg-alpha px-4 py-2 text-sm font-semibold text-white hover:bg-alpha/90 focus:outline-none focus:ring-2 focus:ring-alpha focus:ring-offset-2">
                                Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Feed --}}
    <div class="mt-6  space-y-4">

        @forelse ($posts as $post)
            <article class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
                <div class="flex items-center justify-between gap-2 p-4 pb-2">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-alpha/10 text-sm font-semibold text-alpha">
                            JD
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $post->student->name }}</p>
                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 pb-3">
                    <p class="text-gray-800 leading-relaxed">
                        {{ $post->post }}
                    </p>
                </div>

                <div class="flex border-t border-gray-100">
                    <button class="flex-1 py-2.5 text-sm text-gray-600 hover:bg-gray-50">Like</button>
                    <button class="flex-1 py-2.5 text-sm text-gray-600 hover:bg-gray-50">Comment</button>
                    <button class="flex-1 py-2.5 text-sm text-gray-600 hover:bg-gray-50">Share</button>
                </div>
            </article>
        @empty
        @endforelse




    </div>
@endsection
