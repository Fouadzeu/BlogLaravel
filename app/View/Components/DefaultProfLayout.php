<?php

namespace App\View\Components;

use App\View\Components\AbstractLayout;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DefaultProfLayout extends AbstractLayout
{


    public function __construct(
        public string $title='',
        public string $action='',
        public string $submitMessage='Soumettre'
        )
    {
        parent::__construct($title);
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $prof=Auth::guard('professeur')->user();
        return view('layouts.defaultprof',compact("prof"));
    }
}
