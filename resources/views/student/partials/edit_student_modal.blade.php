<input type="checkbox" id="edit-student-modal-{{ $student->id }}" class="peer sr-only" />

<!-- Trigger button -->
<label for="edit-student-modal-{{ $student->id }}" class="">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi fill-alpha bi-pencil-fill" viewBox="0 0 16 16">
        <path
            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
    </svg>
</label>

<!-- Backdrop + modal -->
<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 peer-checked:flex">

    <!-- Backdrop -->
    <label for="edit-student-modal-{{ $student->id }}" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></label>

    <!-- Modal -->
    <div class="relative w-full max-w-lg rounded-2xl border border-gray-200 bg-white shadow-2xl">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
            <h2 class="text-lg font-semibold text-gray-900">Edit {{ $student->name }}</h2>

            <label for="edit-student-modal-{{ $student->id }}"
                class="flex h-9 w-9 cursor-pointer items-center justify-center rounded-lg text-gray-400 transition hover:bg-gray-100 hover:text-gray-600">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </div>

        <!-- Body -->
        <form action="/student/{{ $student->id }}/update" method="POST" class="space-y-5 px-6 py-5">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Full name</label>
                    <input type="text" name="name" value="{{ old('name', $student->name) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        placeholder="e.g. Jane Doe">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $student->email) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        placeholder="jane@example.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Birthday</label>
                    <input type="date" name="birthday" value="{{ old('birthday', $student->birthday) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha">
                </div>

                <div class="col-span-2">
                    <label class="block col-span-2 text-sm font-medium text-gray-700">Training</label>

                    <select
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        name="training" id="">

                        <option selected disabled value="coding">Pick a training</option>
                        <option @selected($student->training == 'coding') value="coding">coding</option>
                        <option @selected($student->training == 'lakhrin') value="lakhrin">lakhrin</option>

                    </select>
                </div>

                <div class="col-span-2">
                    <label class="block  text-sm font-medium text-gray-700">Progress ({{ $student->progress }}%)</label>
                    <input type="range" name="progress" value="{{ old('progress', $student->progress) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        placeholder="0">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Gender</label>

                    <div class="mt-2 flex gap-6">
                        <label class="inline-flex cursor-pointer items-center gap-2">
                            <input @checked($student->gender == 'male') value="male" name="gender" type="radio"
                                class="h-4 w-4 border-gray-300 text-alpha focus:ring-alpha">
                            <span class="text-sm text-gray-700">Male</span>
                        </label>

                        <label class="inline-flex cursor-pointer items-center gap-2">
                            <input @checked($student->gender == 'female') value="female" name="gender" type="radio"
                                class="h-4 w-4 border-gray-300 text-alpha focus:ring-alpha">
                            <span class="text-sm text-gray-700">Female</span>
                        </label>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="inline-flex cursor-pointer items-center gap-3">
                        <input @checked($student->policy) name="policy" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-alpha focus:ring-alpha">
                        <span class="text-sm font-medium text-gray-700">Accepts policy</span>
                    </label>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-5 sm:flex-row sm:justify-end">

                <label for="edit-student-modal-{{ $student->id }}"
                    class="inline-flex cursor-pointer justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancel
                </label>

                <button type="submit"
                    class="inline-flex justify-center rounded-lg bg-alpha px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-alpha/90">
                    Update
                </button>

            </div>

        </form>

    </div>
</div>
