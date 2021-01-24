<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mail extends Component
{
    public $user;
    public $i;

    public function __construct($user, $i)
    {
        $this->user = $user;
        $this->i = $i;
    }

    public function render()
    {
        return view('components.tools.mail');
    }
}
