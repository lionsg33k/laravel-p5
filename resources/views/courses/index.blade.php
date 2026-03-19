@extends('layouts.index')

@section('content')
    @php

        $courseRows = [
            ['field' => 'Laravel', 'students' => ['Alex Rivera', 'Omar Aziz', 'Lina Costa'], 'level' => 'Advanced', 'hours' => 48],
            ['field' => 'SQL', 'students' => ['Jordan Lee', 'Nina Patel'], 'level' => 'Intermediate', 'hours' => 32],
            ['field' => 'UI/UX Design', 'students' => ['Sam Chen', 'Lina Costa'], 'level' => 'Advanced', 'hours' => 40],
            ['field' => 'REST APIs', 'students' => ['Alex Rivera', 'Jordan Lee', 'Omar Aziz'], 'level' => 'Intermediate', 'hours' => 28],
            ['field' => 'Testing', 'students' => ['Nina Patel', 'Sam Chen'], 'level' => 'Beginner', 'hours' => 20],
        ];
    @endphp

    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between py-2">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Courses</h1>
            <p class="mt-1 text-sm text-gray-500">Manage which students are studying each field</p>
        </div>
        @include('courses.partials.assign_fields_modal')
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Total Students</p>
            <p class="mt-1 text-3xl font-bold text-gray-900">{{ count($students) }}</p>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Available Fields</p>
            <p class="mt-1 text-3xl font-bold text-gray-900">{{ count($fields) }}</p>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Active Enrollments</p>
            <p class="mt-1 text-3xl font-bold text-gray-900">37</p>
        </div>
    </div>

    <div class="mt-8 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 bg-gray-50/80 px-5 py-4">
            <h2 class="text-sm font-semibold text-gray-800">Fields & Students</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-alpha text-white">
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Field</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Students</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Level</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Hours</th>
                        <th class="px-5 py-3.5 text-right text-xs font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($courseRows as $row)
                        <tr class="transition hover:bg-gray-50/80">
                            <td class="whitespace-nowrap px-5 py-4 text-sm font-semibold text-gray-900">{{ $row['field'] }}</td>
                            <td class="px-5 py-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($row['students'] as $studentName)
                                        <span class="inline-flex rounded-full bg-alpha/10 px-2.5 py-1 text-xs font-medium text-alpha">{{ $studentName }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-gray-700">{{ $row['level'] }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-gray-700">{{ $row['hours'] }}h</td>
                            <td class="whitespace-nowrap px-5 py-4 text-right text-sm">
                                <button type="button" class="font-medium text-alpha transition hover:text-alpha/80">Manage</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
