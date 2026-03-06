@extends('layouts.index')

@section('content')
    @php $students = $students ?? collect([]); @endphp
    {{-- Page header --}}
    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between py-2">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Student Dashboard</h1>
            <p class="mt-1 text-sm text-gray-500">Manage and track your students</p>
        </div>
        @include('student.partials.create_student_modal')
    </div>

    {{-- Stats cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-alpha/10">
                    <svg class="h-6 w-6 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Students</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $students->count() }}</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-alpha/10">
                    <svg class="h-6 w-6 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">In Training</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $students->where('progress', '<', 100)->count() ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-alpha/10">
                    <svg class="h-6 w-6 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Completed</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $students->where('progress', 100)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Students table card --}}
    <div class="mt-8 rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <div class="border-b border-gray-200 bg-gray-50/80 px-5 py-4">
            <h2 class="text-sm font-semibold text-gray-800">Students</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-alpha text-white">
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Birthday</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Training</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Gender</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Progress</th>
                        <th scope="col" class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Policy</th>
                        <th scope="col" class="px-5 py-3.5 text-right text-xs font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($students as $student)
                        <tr class="transition hover:bg-gray-50/70">
                            <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-gray-900">{{ $student->name }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-gray-600">{{ $student->email }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-gray-600">{{ $student->birthday?->format('M d, Y') }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-gray-600">{{ $student->training }}</td>
                            <td class="whitespace-nowrap px-5 py-4">
                                <span class="inline-flex rounded-full bg-alpha/10 px-2.5 py-0.5 text-xs font-medium text-alpha">{{ ucfirst($student->gender) }}</span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="h-2 w-24 overflow-hidden rounded-full bg-gray-200">
                                        <div class="h-full rounded-full bg-alpha" style="width: {{ $student->progress ?? 0 }}%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ $student->progress ?? 0 }}%</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-5 py-4">
                                @if($student->policy)
                                    <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Yes</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">No</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-right text-sm">
                                <button type="button" class="font-medium text-alpha hover:text-alpha/80">Edit</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center gap-3 text-gray-500">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-alpha/10">
                                        <svg class="h-7 w-7 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium">No students yet</p>
                                    <p class="text-xs">Add your first student using the button above.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
