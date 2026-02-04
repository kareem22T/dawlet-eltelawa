<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contestant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContestantController extends Controller
{
    /**
     * Display a listing of contestants
     */
    public function index()
    {
        $contestants = Contestant::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contestants.index', compact('contestants'));
    }

    /**
     * Show the form for creating a new contestant
     */
    public function create()
    {
        return view('admin.contestants.create');
    }

    /**
     * Store a newly created contestant
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'city' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('contestants', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Contestant::create($validated);

        return redirect()->route('admin.contestants.index')
            ->with('success', 'تم إضافة المتسابق بنجاح');
    }

    /**
     * Show the form for editing the contestant
     */
    public function edit(Contestant $contestant)
    {
        return view('admin.contestants.edit', compact('contestant'));
    }

    /**
     * Update the contestant
     */
    public function update(Request $request, Contestant $contestant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'city' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($contestant->image) {
                Storage::disk('public')->delete($contestant->image);
            }
            $validated['image'] = $request->file('image')->store('contestants', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $contestant->update($validated);

        return redirect()->route('admin.contestants.index')
            ->with('success', 'تم تحديث المتسابق بنجاح');
    }

    /**
     * Remove the contestant
     */
    public function destroy(Contestant $contestant)
    {
        // Delete image
        if ($contestant->image) {
            Storage::disk('public')->delete($contestant->image);
        }

        $contestant->delete();

        return redirect()->route('admin.contestants.index')
            ->with('success', 'تم حذف المتسابق بنجاح');
    }

    /**
     * View contestant votes
     */
    public function votes(Contestant $contestant)
    {
        $votes = $contestant->votes()
            ->orderBy('voted_at', 'desc')
            ->paginate(20);

        return view('admin.contestants.votes', compact('contestant', 'votes'));
    }
}