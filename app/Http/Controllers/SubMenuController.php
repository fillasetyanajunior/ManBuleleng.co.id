<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    public function index()
    {
        $data['submenu'] = SubMenu::paginate(20);
        $data['menu'] = Menu::all();
        return view('admin.submenu.showsubmenu', $data);
    }
    public function storeSubMenu(Request $request)
    {
        $request->validate([
            'id_menu'     => 'required',
            'title'     => 'required',
            'icon'      => 'required',
            'url'      => 'required',
        ]);

        SubMenu::create([
            'id_menu'     => $request->id_menu,
            'title'     => $request->title,
            'icon'     => $request->icon,
            'url'     => $request->url,
        ]);
        return redirect()->route('submenu')->with('status', 'Tambah Sub Menu Berhasil');
    }
    public function editSubMenu(Request $request)
    {
        $request->only('id');
        $query = SubMenu::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateSubMenu(Request $request, SubMenu $subMenu)
    {
        SubMenu::where('id', $subMenu->id)
            ->update([
            'id_menu'     => $request->id_menu,
            'title'     => $request->title,
            'icon'     => $request->icon,
            'url'     => $request->url,
            ]);
        return redirect()->route('submenu')->with('status', 'Upate Sub Menu Berhasil');
    }
    public function destroy(SubMenu $subMenu)
    {
        SubMenu::destroy($subMenu->id);
        return redirect()->route('submenu')->with('status', 'Delete Sub Menu Berhasil');
    }
}
