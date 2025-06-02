<x-layout>
    <x-slot:heading>
        Create Job 💼
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Job Details ℹ️</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Provide the essential information for the job listing.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    {{-- Title --}}
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Job Title 🏷️</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="e.g., Senior Software Engineer" required>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>                            
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description 📝</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="5" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Provide a detailed description of the job responsibilities, requirements, and benefits." required></textarea>
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
                            <input type="text" name="location" id="location" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="e.g., Remote, New York, NY" required>
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
                                <input type="number" name="salary" id="salary" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="e.g., 80000" required>
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
                            <input type="text" name="company" id="company" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="e.g., Acme Corp" required>
                        </div>
                        @error('company')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs" class="text-sm/6 font-semibold text-gray-900">Cancel ❌</a>
            <button type="submit" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Create
            </button>
        </div>
    </form>
</x-layout>