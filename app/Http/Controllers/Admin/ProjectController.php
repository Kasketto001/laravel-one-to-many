<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;

        if ($request->hasFile('thumb')) {
            $image_path = $request->file('thumb')->store('public/uploads');
            $validated['thumb'] = $image_path;
        }

        Project::create($validated);
        
        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        if ($request->hasFile('thumb')) {
            if ($project->thumb && Storage::exists($project->thumb)) {
                Storage::delete($project->thumb);
            }
            $validated['thumb'] = $request->file('thumb')->store('public/uploads');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->thumb && Storage::exists($project->thumb)) {
            Storage::delete($project->thumb);
        }

        $project->delete();
        return to_route('admin.projects.index');
    }
}
