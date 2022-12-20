<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ModalEditComponent extends Component
{
    public $modalTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalTitle)
    {
        $this->modalTitle = $modalTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal-edit-component');
    }
}
