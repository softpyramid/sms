<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between">
            @if(request()->routeIs('student.create'))
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"> {{ __('Student Admission') }}</h2>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <a href="{{ route('students') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Cancel') }}</a>
                </div>
            @else
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"> {{ __('Students Dashboard') }}</h2>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <button type="button" disabled class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Import Students') }}</button>
                    <a href="{{ route('student.create') }}" class="ml-3 inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Add Student') }}</a>
                </div>
            @endif
        </div>
    </x-slot>

    @if(request()->routeIs('student.create'))
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('create-student')
            <x-jet-section-border />
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('list-students')
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
