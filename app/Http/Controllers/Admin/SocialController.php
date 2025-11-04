<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
class SocialController extends Controller
{
    
   public function index(Request $request)
{
    // Get ?sort=asc or ?sort=desc (default asc)
    $sort = $request->query('sort', 'asc');

    // Validate sort direction
    if (!in_array(strtolower($sort), ['asc', 'desc'])) {
        $sort = 'asc';
    }

    // Get socials ordered by position
    $socials = Social::orderBy('position', $sort)
                 ->orderBy('name', 'asc')
                 ->get();


    // Pass sort direction to view too
    return view('admins.socials.index', compact('socials', 'sort'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $r)
{
   
$social=new Social();
$social->name=$r->name;
$social->link=$r->link;

    // ✅ Handle file upload
    $iconPath = null;
    if ($r->hasFile('icon')) {
        $iconPath = $r->file('icon')->store('social_icons', 'public');
    }

    // ✅ Save to DB
    Social::create([
        'name' => $r->name,
        'icon' => $iconPath, // store file path as string
        'link' => $r->link,
    ]);

    return redirect()->route('social.index')->with('success', 'Social created successfully!');
}

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admins.socials.edit',['social'=>Social::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Social $social)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        'link' => 'required|url',
    ]);

    if ($request->hasFile('icon')) {
        $iconPath = $request->file('icon')->store('social_icons', 'public');
        $social->icon = $iconPath;
    }

    $social->name = $request->name;
    $social->link = $request->link;
    $social->save();

    return redirect()->route('social.index')->with('success', 'Social updated successfully!');
}
public function delete($id)
{
    $social = Social::findOrFail($id);

    // Optionally delete the uploaded icon file
    if ($social->icon && file_exists(public_path($social->icon))) {
        unlink(public_path($social->icon));
    }

    $social->delete();

    return redirect()->route('social.index')->with('success', 'Social deleted successfully!');
}

}
