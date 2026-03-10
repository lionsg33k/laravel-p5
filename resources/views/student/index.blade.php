@extends('layouts.index')

@section('content')
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

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-alpha/10">
                    <svg class="h-6 w-6 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Students</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $students->count() }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-alpha/10">
                    <svg class="h-6 w-6 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 12l2 2 4-4" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Coding</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $students->where('training', 'coding')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-alpha/10">
                    <svg class="h-6 w-6 text-alpha" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M9 12l2 2 4-4" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Lakhrin</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $students->where('training', 'lakhrin')->count() }}</p>
                </div>
            </div>
        </div>

    </div>

    {{-- Students table --}}
    <div class="mt-8 rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">

        <div class="border-b border-gray-200 bg-gray-50 px-5 py-4">
            <h2 class="text-sm font-semibold text-gray-800">Students</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">

                <thead>
                    <tr class="bg-alpha text-white">
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Name</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Email</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Birthday</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Training</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Gender</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Progress</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Policy</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">


                    @forelse ($students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 text-sm font-medium text-gray-900">{{ $student->name }}</td>
                            <td class="px-5 py-4 text-sm text-gray-600">{{ $student->email }}</td>
                            <td class="px-5 py-4 text-sm text-gray-600">{{ $student->birthday }}</td>
                            <td class="px-5 py-4 text-sm text-gray-600">{{ $student->training }}</td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex rounded-full bg-alpha/10 px-2 py-1 text-xs text-alpha">{{ $student->gender }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="h-2 w-24 bg-gray-200 rounded-full">
                                        <div class="h-full bg-alpha rounded-full" style="width:{{ $student->progress }}%">
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ $student->progress }}%</span>
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">{{ $student->policy == true ? 'Yes' : 'No' }}</span>
                            </td>
                            <td class="px-5 py-4 text-right flex items-center space-x-2">
                                {{-- /student/{{ $student->id }}/show --}}
                                <a href="{{ route('student.show', $student) }}"
                                    class="text-alpha font-medium hover:text-alpha/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                    </svg>
                                </a>

                                @include('student.partials.edit_student_modal', $student)

                                <button class="text-alpha font-medium hover:text-alpha/80">
                                    <form method="POST" action="{{ route('student.destroy', $student) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </button>
                            </td>
                        </tr>
                    @empty

                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center gap-3 text-gray-500">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-alpha/10">
                                        <svg class="h-7 w-7 text-alpha" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
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
