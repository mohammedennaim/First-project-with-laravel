<?php

namespace App\Http\Controllers;

use App\Models\ClubModel;
use App\Http\Requests\ClubRequest;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index()
    {
        $clubs = ClubModel::paginate(10);
        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(ClubRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('clubs', 'public');
        }

        ClubModel::create($data);

        return redirect()->route('clubs.index')
            ->with('success', 'Club créé avec succès.');
    }

    public function show(ClubModel $club)
    {
        return view('clubs.show', compact('club'));
    }

    public function edit(ClubModel $club)
    {
        return view('clubs.edit', compact('club'));
    }

    public function update(ClubRequest $request, ClubModel $club)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($club->logo) {
                Storage::disk('public')->delete($club->logo);
            }
            $data['logo'] = $request->file('logo')->store('clubs', 'public');
        }

        $club->update($data);

        return redirect()->route('clubs.index')
            ->with('success', 'Club mis à jour avec succès.');
    }

    public function destroy(ClubModel $club)
    {
        $club->delete();

        return redirect()->route('clubs.index')
            ->with('success', 'Club archivé avec succès.');
    }
}
