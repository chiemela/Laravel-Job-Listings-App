<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }} 💼
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        {{-- Method Spoofing for PUT/PATCH --}}
        @method('PATCH')
        
        {{-- Flash Message --}}
        @if (session('status'))
            <div class="mb-4 text-sm/6 text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        {{-- CSRF Token --}}
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    {{-- Title --}}
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Job Title 🏷️</label>
                        <div class="mt-2">
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                                placeholder="e.g., Senior Software Engineer" 
                                required
                                value="{{ old('title', $job->title) }}"
                            >
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>                            
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description 📝</label>
                        <div class="mt-2">
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="5" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                                placeholder="Provide a detailed description of the job responsibilities, requirements, and benefits." 
                                required
                                >{{ old('description', $job->description) }}
                            </textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>                            
                        @enderror
                        <p class="mt-3 text-sm/6 text-gray-600">Clearly outline the role and what you're looking for. 🔍</p>
                    </div>

                    {{-- Location --}}
                    <div class="sm:col-span-3">
                        <label for="location" class="block text-sm/6 font-medium text-gray-900">Location 📍</label>
                        <div class="mt-2">
                            <input 
                                type="text" 
                                name="location" 
                                id="location" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                                placeholder="e.g., Remote, New York, NY" 
                                required
                                value="{{ old('location', $job->location) }}"
                            >
                        </div>
                        @error('location')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>                            
                        @enderror
                    </div>

                    {{-- Salary --}}
                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary (Annual) 💰</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <span class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">$</span>
                                <input 
                                    type="number" 
                                    name="salary" 
                                    id="salary" 
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                                    placeholder="e.g., 80000" 
                                    required
                                    value="{{ old('salary', $job->salary) }}"
                                >
                            </div>
                            @error('salary')
                                <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Company --}}
                    <div class="sm:col-span-4">
                        <label for="company" class="block text-sm/6 font-medium text-gray-900">Company Name 🏢</label>
                        <div class="mt-2">
                            <input 
                                type="text" 
                                name="company" 
                                id="company" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                                placeholder="e.g., Acme Corp" 
                                required
                                value="{{ old('company', $job->employer->name) }}"
                            >
                        </div>
                        @error('company')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                {{-- Delete Button --}}
                <button form="delete-job-form" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-red-600 leading-5 rounded-md hover:bg-red-700 focus:outline-none focus:ring ring-red-300 focus:border-red-500 active:bg-red-800 transition ease-in-out duration-150">
                    <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.166L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    Delete
                </button>
            </div>
            <div class="flex items-center gap-x-6">
                {{-- Cancel Link --}}
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel ❌</a>
                {{-- Update Button --}}
                <button type="submit" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Update
                </button>
            </div>
        </div>
    </form>
    <form method="POST" action="/jobs/{{ $job->id }}" class="hidden mt-6" id="delete-job-form">
        {{-- Method Spoofing for DELETE --}}
        @csrf
        @method('DELETE')
    </form>
</x-layout>