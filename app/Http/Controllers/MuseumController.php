<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MuseumController extends Controller
{
    public function index(): View
    {
        $museums = Museum::query()
            ->withCount('exhibitions')
            ->orderBy('name')
            ->get();

        return view('museums.index', compact('museums'));
    }

    public function create(): View
    {
        return view('museums.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Museum::create($validated);

        return redirect()
            ->route('museums.index')
            ->with('success', 'Museum created successfully.');
    }

    public function edit(Museum $museum): View
    {
        return view('museums.edit', compact('museum'));
    }

    public function update(Request $request, Museum $museum): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $museum->update($validated);

        return redirect()
            ->route('museums.index')
            ->with('success', 'Museum updated successfully.');
    }

    public function destroy(Museum $museum): RedirectResponse
    {
        $museum->delete();

        return redirect()
            ->route('museums.index')
            ->with('success', 'Museum deleted successfully.');
    }
}
