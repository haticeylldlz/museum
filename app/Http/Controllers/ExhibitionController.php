<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Models\Museum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExhibitionController extends Controller
{
    public function index(Request $request): View
    {
        $museums = Museum::query()->orderBy('name')->get();

        $exhibitions = Exhibition::query()
            ->with('museum')
            ->when($request->filled('museum_id'), function ($query) use ($request) {
                $query->where('museum_id', $request->integer('museum_id'));
            })
            ->orderBy('date')
            ->get();

        return view('exhibitions.index', [
            'exhibitions' => $exhibitions,
            'museums' => $museums,
            'selectedMuseumId' => $request->integer('museum_id') ?: null,
        ]);
    }

    public function create(): View
    {
        $museums = Museum::query()->orderBy('name')->get();

        return view('exhibitions.create', compact('museums'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'museum_id' => ['required', 'exists:museums,id'],
        ]);

        Exhibition::create($validated);

        return redirect()
            ->route('exhibitions.index')
            ->with('success', 'Exhibition created successfully.');
    }

    public function edit(Exhibition $exhibition): View
    {
        $museums = Museum::query()->orderBy('name')->get();

        return view('exhibitions.edit', compact('exhibition', 'museums'));
    }

    public function update(Request $request, Exhibition $exhibition): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'museum_id' => ['required', 'exists:museums,id'],
        ]);

        $exhibition->update($validated);

        return redirect()
            ->route('exhibitions.index')
            ->with('success', 'Exhibition updated successfully.');
    }

    public function destroy(Exhibition $exhibition): RedirectResponse
    {
        $exhibition->delete();

        return redirect()
            ->route('exhibitions.index')
            ->with('success', 'Exhibition deleted successfully.');
    }
}
