<?php

namespace App\View\Components;

use App\View\Components\AbstractLayout;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DefaultLayout extends AbstractLayout
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user=Auth::user();
        return view('layouts.default',compact("user"));
    }
}
