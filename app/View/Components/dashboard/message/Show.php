<?php

namespace App\View\Components\dashboard\message;

use Illuminate\View\Component;

class Show extends Component
{
    public $message;
    public $i;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $i)
    {
        $this->message = $message;
        $this->i = $i;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.message.show');
    }
}
