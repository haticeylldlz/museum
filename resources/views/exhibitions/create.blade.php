<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Exhibition') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-flash-message />

                    @if ($museums->isEmpty())
                        <p class="text-gray-600">
                            {{ __('Create a museum first before adding exhibitions.') }}
                            <a href="{{ route('museums.create') }}" class="text-indigo-600 underline">{{ __('Add museum') }}</a>
                        </p>
                    @else
                        <form method="POST" action="{{ route('exhibitions.store') }}" class="space-y-4">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="date" :value="__('Date')" />
                                <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="old('date')" required />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="museum_id" :value="__('Museum')" />
                                <select id="museum_id" name="museum_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">{{ __('Select a museum') }}</option>
                                    @foreach ($museums as $museum)
                                        <option value="{{ $museum->id }}" @selected(old('museum_id') == $museum->id)>
                                            {{ $museum->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('museum_id')" class="mt-2" />
                            </div>

                            <div class="flex gap-3">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="{{ route('exhibitions.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
