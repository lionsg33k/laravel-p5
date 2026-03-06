<input type="checkbox" id="create-student-modal" class="peer sr-only" />

<!-- Trigger button -->
<label for="create-student-modal"
    class="inline-flex cursor-pointer items-center gap-2 rounded-lg bg-alpha px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-alpha/90 focus:outline-none focus:ring-2 focus:ring-alpha focus:ring-offset-2">
    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Add Student
</label>

<!-- Backdrop + modal -->
<div class="fixed inset-0 z-50 hidden items-center justify-center p-4 peer-checked:flex">

    <!-- Backdrop -->
    <label for="create-student-modal" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></label>

    <!-- Modal -->
    <div class="relative w-full max-w-lg rounded-2xl border border-gray-200 bg-white shadow-2xl">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
            <h2 class="text-lg font-semibold text-gray-900">Create Student</h2>

            <label for="create-student-modal"
                class="flex h-9 w-9 cursor-pointer items-center justify-center rounded-lg text-gray-400 transition hover:bg-gray-100 hover:text-gray-600">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </div>

        <!-- Body -->
        <form action="/student/store" method="POST" class="space-y-5 px-6 py-5">
            @csrf

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Full name</label>
                    <input type="text" name="name"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        placeholder="e.g. Jane Doe">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        placeholder="jane@example.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Birthday</label>
                    <input type="date" name="birthday"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha">
                </div>

                <div class="col-span-2">
                    <label class="block col-span-2 text-sm font-medium text-gray-700">Training</label>

                    <select
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        name="training" id="">

                        <option selected disabled value="coding">Pick a training</option>
                        <option value="coding">coding</option>
                        <option value="lakhrin">lakhrin</option>

                    </select>
                </div>

                <div class="col-span-2">
                    <label class="block  text-sm font-medium text-gray-700">Progress (%)</label>
                    <input type="range" name="progress"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-alpha focus:outline-none focus:ring-1 focus:ring-alpha"
                        placeholder="0">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Gender</label>

                    <div class="mt-2 flex gap-6">
                        <label class="inline-flex cursor-pointer items-center gap-2">
                            <input value="male" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-alpha focus:ring-alpha">
                            <span class="text-sm text-gray-700">Male</span>
                        </label>

                        <label class="inline-flex cursor-pointer items-center gap-2">
                            <input value="female" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-alpha focus:ring-alpha">
                            <span class="text-sm text-gray-700">Female</span>
                        </label>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="inline-flex cursor-pointer items-center gap-3">
                        <input name="policy" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-alpha focus:ring-alpha">
                        <span class="text-sm font-medium text-gray-700">Accepts policy</span>
                    </label>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-5 sm:flex-row sm:justify-end">

                <label for="create-student-modal"
                    class="inline-flex cursor-pointer justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancel
                </label>

                <button type="submit"
                    class="inline-flex justify-center rounded-lg bg-alpha px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-alpha/90">
                    Create Student
                </button>

            </div>

        </form>

    </div>
</div>
