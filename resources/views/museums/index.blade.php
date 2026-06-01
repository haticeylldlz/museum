<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Museums') }}
            </h2>
            <a href="{{ route('museums.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-indigo-500">
                {{ __('Add Museum') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-flash-message />

                    <div class="mb-4">
                        <a href="{{ route('exhibitions.index') }}" class="text-sm text-indigo-600 underline">{{ __('Back to exhibitions') }}</a>
                    </div>

                    @if ($museums->isEmpty())
                        <p class="text-gray-500">{{ __('No museums found.') }}</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Name') }}</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Exhibitions') }}</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($museums as $museum)
                                        <tr>
                                            <td class="px-4 py-3 text-sm font-medium">{{ $museum->name }}</td>
                                            <td class="px-4 py-3 text-sm">{{ $museum->exhibitions_count }}</td>
                                            <td class="whitespace-nowrap px-4 py-3 text-right text-sm">
                                                <a href="{{ route('museums.edit', $museum) }}" class="text-indigo-600 hover:underline">{{ __('Edit') }}</a>
                                                <form method="POST" action="{{ route('museums.destroy', $museum) }}" class="inline" onsubmit="return confirm('{{ __('Delete this museum? Related exhibitions will also be removed.') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ms-3 text-red-600 hover:underline">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
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
