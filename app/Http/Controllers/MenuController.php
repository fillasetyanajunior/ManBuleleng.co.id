<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $data['menu'] = Menu::paginate(20);
        return view('admin.menu.showmenu',$data);
    }
    public function storeMenu(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'icon'      => 'required',
        ]);

        Menu::create([
            'title'     => $request->title,
            'icon'     => $request->icon,
        ]);
        return redirect()->route('menu')->with('status', 'Tambah Menu Berhasil');
    }
    public function editMenu(Request $request)
    {
        $request->only('id');
        $query = Menu::where('id', $request->id)->get();
        return response()->json([
            'status' =>'ok',
            'data' => $query
        ]);
    }
    public function updateMenu(Request $request,Menu $menu)
    {
        Menu::where('id',$menu->id)
            ->update([
                'title' => $request->title,
                'icon' => $request->icon,
            ]);
        return redirect()->route('menu')->with('status','Upate Menu Berhasil');
    }
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect()->route('menu')->with('status', 'Delete Menu Berhasil');
    }
}
