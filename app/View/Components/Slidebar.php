<?php

namespace App\View\Components;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\View\Component;

class Slidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (request()->user()->role == 3) {
            $data['avatar'] = Siswa::where('nama',request()->user()->name)->first();
        } else {
            $data['avatar'] = Guru::where('nama', request()->user()->name)->first();
        }
        
        return view('components.slidebar',$data);
    }
}
