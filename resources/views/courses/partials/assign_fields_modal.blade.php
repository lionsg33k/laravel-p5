<input type="checkbox" id="assign-fields-modal" class="peer sr-only" />

<label for="assign-fields-modal"
    class="inline-flex cursor-pointer items-center gap-2 rounded-lg bg-alpha px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-alpha/90 focus:outline-none focus:ring-2 focus:ring-alpha focus:ring-offset-2">
    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Assign Fields
</label>

<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 peer-checked:flex">
    <label for="assign-fields-modal" class="absolute inset-0 bg-black/55 backdrop-blur-sm"></label>

    <div class="relative w-full max-w-5xl rounded-2xl border border-gray-200 bg-white shadow-2xl">
        <div class="border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Assign Study Fields</h2>
                    <p class="mt-1 text-sm text-gray-500">Step-by-step setup for students and learning fields</p>
                </div>
                <label for="assign-fields-modal"
                    class="flex h-9 w-9 cursor-pointer items-center justify-center rounded-lg text-gray-400 transition hover:bg-gray-100 hover:text-gray-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-2 text-xs font-semibold">
                <div class="rounded-lg bg-alpha px-3 py-2 text-center text-white">1. Students</div>
                <div class="rounded-lg bg-alpha/10 px-3 py-2 text-center text-alpha">2. Fields</div>
                <div class="rounded-lg bg-gray-100 px-3 py-2 text-center text-gray-500">3. Extra (planned)</div>
            </div>
        </div>

        <form id="hh" action="/courses" method="POST" class="max-h-[72vh] overflow-y-auto px-6 py-6 space-y-8">
            @csrf
            {{-- Step 1: select students --}}
            <section>
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-gray-900">Step 1: Select student(s)</h3>
                    <span class="rounded-full bg-alpha/10 px-3 py-1 text-xs font-medium text-alpha">Multi-select</span>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($students as $student)
                        <label
                            class="group relative cursor-pointer rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition hover:border-alpha/40 hover:shadow-md">
                            <input type="checkbox" name="student_ids[]" value="{{ $student['id'] }}" class="peer sr-only">
                            <div
                                class="absolute right-3 top-3 flex h-5 w-5 items-center justify-center rounded border border-gray-300 text-transparent transition peer-checked:border-alpha peer-checked:bg-alpha peer-checked:text-white">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="flex items-start gap-3">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-alpha/10 text-sm font-bold text-alpha">
                                    {{ $student->name[0] }}
                                </div>
                                <div class="min-w-0">
                                    <p class="truncate font-semibold text-gray-900">{{ $student['name'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $student['major'] }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="mb-1 flex items-center justify-between text-xs">
                                    <span class="text-gray-500">Progress</span>
                                    <span class="font-medium text-gray-700">{{ $student['progress'] }}%</span>
                                </div>
                                <div class="h-2 rounded-full bg-gray-200">
                                    <div class="h-2 rounded-full bg-alpha" style="width: {{ $student['progress'] }}%"></div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            </section>

            {{-- Step 2: select/create fields --}}
            <section class="rounded-2xl border border-gray-200 bg-gray-50/60 p-5">
                <div class="mb-5 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-gray-900">Step 2: Select fields or add custom one</h3>
                    <span class="rounded-full bg-white px-3 py-1 text-xs font-medium text-gray-600 shadow-sm">Tag-style selection</span>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($fields as $field)
                        <label
                            class="cursor-pointer rounded-lg border border-gray-200 bg-white px-3 py-2.5 text-sm font-medium text-gray-700 transition hover:border-alpha/40 hover:text-alpha">
                            <input type="checkbox" name="field_ids[]" value="{{ $field['id'] }}" class="mr-2 h-4 w-4 rounded border-gray-300 text-alpha focus:ring-alpha">
                            {{ $field['name'] }}
                        </label>
                    @endforeach
                </div>

                <form action="/courses" method="POST" class="mt-5 border-t border-gray-200 pt-4">
                    @csrf
                    <label class="block text-xs font-semibold uppercase tracking-wide text-gray-500">Create non-existing field</label>
                    <div class="mt-2 flex flex-col gap-2 sm:flex-row">
                        <input type="text" placeholder="e.g. Cloud Security" name="name"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha">
                        <button
                            class="rounded-lg border border-alpha bg-alpha/10 px-4 py-2.5 text-sm font-semibold text-alpha transition hover:bg-alpha hover:text-white">
                            Add Field
                        </button>
                    </div>
                </form>
            </section>

            {{--
            Step 3: planned extra details
            <section class="rounded-2xl border border-dashed border-gray-300 bg-white p-5">
                <h3 class="text-sm font-semibold text-gray-900">Step 3: Extra details (coming soon)</h3>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Grade</label>
                        <input type="text" class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Semester</label>
                        <input type="text" class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2.5">
                    </div>
                </div>
            </section>
            --}}

            <button form="hh">hghjgjhgjhgjhgjh</button>
        </form>

        <div class="flex flex-col-reverse gap-3 border-t border-gray-200 px-6 py-4 sm:flex-row sm:justify-between">
            <label for="assign-fields-modal"
                class="inline-flex cursor-pointer items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                Cancel
            </label>
            <div class="flex items-center gap-2">
                <button type="button"
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                    Next Step
                </button>
                <button type="button"
                    class="rounded-lg bg-alpha px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-alpha/90 focus:outline-none focus:ring-2 focus:ring-alpha focus:ring-offset-2">
                    Save Selection
                </button>
            </div>
        </div>
    </div>
</div>
