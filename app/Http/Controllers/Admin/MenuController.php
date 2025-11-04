<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
   public function index(){
    $data['menus']=Menu::where('active',1)
    ->where('parent_id',0)
    ->orderBy('position')
    ->get();
    return view('admins.menus.index',$data);
   }
public function detail($id){
    $data['m']=Menu::find($id);
   $data['subs'] = Menu::where('parent_id', $id)
    ->where('active', 1)
    ->orderBy('position')
    ->get();

    return view('admins.menus.detail',$data);

}
public function create()
    {
        return view('admins.menus.create'); // Points to resources/views/menu/create.blade.php
    }

    // Store the new menu in the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        // Create new menu
        Menu::create([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        // Redirect back to menu list with success message
        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }

public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admins.menus.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }
}
