<?php

namespace App\Http\Controllers;

use App\Models\AccessMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class AccessMenuController extends Controller
{
    public function index()
    {
        $data['menu'] = Menu::all();
        if (request()->user()->role == 4) {
            $data['accessmenu'] = AccessMenu::paginate(20);
        } else {
            $data['accessmenu'] = AccessMenu::where('id_role','!=','4')->paginate(20);
        }
        
        return view('admin.accessmenu.showaccessmenu', $data);
    }
    public function storeAccessMenu(Request $request)
    {
        $request->validate([
            'id_menu'     => 'required',
            'id_role'      => 'required',
        ]);

        AccessMenu::create([
            'id_menu'     => $request->id_menu,
            'id_role'     => $request->id_role,
        ]);
        return redirect()->route('accessmenu')->with('status', 'Tambah Access Menu Berhasil');
    }
    public function editAccessMenu(Request $request)
    {
        $request->only('id');
        $query = AccessMenu::where('id', $request->id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $query
        ]);
    }
    public function updateAccessMenu(Request $request, AccessMenu $accessMenu)
    {
        AccessMenu::where('id', $accessMenu->id)
            ->update([
            'id_menu'     => $request->id_menu,
            'id_role'     => $request->id_role,
            ]);
        return redirect()->route('accessmenu')->with('status', 'Upate Access Menu Berhasil');
    }
    public function destroy(AccessMenu $accessMenu)
    {
        AccessMenu::destroy($accessMenu->id);
        return redirect()->route('accessmenu')->with('status', 'Delete Access Menu Berhasil');
    }
}
