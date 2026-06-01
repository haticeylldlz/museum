<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Exhibitions') }}
            </h2>
            @if (auth()->user()->isAdmin())
                <div class="flex gap-2">
                    <a href="{{ route('museums.index') }}" class="inline-flex items-center rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700">
                        {{ __('Museums') }}
                    </a>
                    <a href="{{ route('exhibitions.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-indigo-500">
                        {{ __('Add Exhibition') }}
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-flash-message />

                    <form method="GET" action="{{ route('exhibitions.index') }}" class="mb-6 flex flex-wrap items-end gap-4">
                        <div>
                            <x-input-label for="museum_id" :value="__('Filter by museum')" />
                            <select id="museum_id" name="museum_id" class="mt-1 block w-full min-w-[240px] rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">{{ __('All museums') }}</option>
                                @foreach ($museums as $museum)
                                    <option value="{{ $museum->id }}" @selected($selectedMuseumId === $museum->id)>
                                        {{ $museum->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-primary-button type="submit">{{ __('Filter') }}</x-primary-button>
                        @if ($selectedMuseumId)
                            <a href="{{ route('exhibitions.index') }}" class="text-sm text-gray-600 underline">{{ __('Clear filter') }}</a>
                        @endif
                    </form>

                    @if ($exhibitions->isEmpty())
                        <p class="text-gray-500">{{ __('No exhibitions found.') }}</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Date') }}</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Title') }}</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Museum') }}</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Description') }}</th>
                                        @if (auth()->user()->isAdmin())
                                            <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Actions') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($exhibitions as $exhibition)
                                        <tr>
                                            <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $exhibition->date->format('Y-m-d') }}</td>
                                            <td class="px-4 py-3 text-sm font-medium">{{ $exhibition->title }}</td>
                                            <td class="px-4 py-3 text-sm">{{ $exhibition->museum->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ Str::limit($exhibition->description, 120) }}</td>
                                            @if (auth()->user()->isAdmin())
                                                <td class="whitespace-nowrap px-4 py-3 text-right text-sm">
                                                    <a href="{{ route('exhibitions.edit', $exhibition) }}" class="text-indigo-600 hover:underline">{{ __('Edit') }}</a>
                                                    <form method="POST" action="{{ route('exhibitions.destroy', $exhibition) }}" class="inline" onsubmit="return confirm('{{ __('Delete this exhibition?') }}');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="ms-3 text-red-600 hover:underline">{{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
