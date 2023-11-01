<?php

namespace App\Livewire;

use Livewire\Component;

class AdminSetting extends Component
{
    public $tab=null;
    public $default_tab='general_settings';
    protected  $queryString=['tab'];
    public function selectTab($tab){
        $this->tab=$tab;
    }

    public function mount(){
        $this->tab=request()->tab ? request()->tab : $this->default_tab;
    }
    public function render()
    {
        return view('livewire.admin-setting');
    }
}
