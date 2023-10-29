<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AdminProfileTabs extends Component
{
    public $tab=null;
    public $tabname='personal_details';
    protected $queryString= ['tab'];
    public function selectTab($tab){
        $this->tab=$tab;
    }
    public function mount(){
        $this->tab=request()->tab ? request()->tab(): $this->tabname;
    }
    public function render()
    {
        return view('livewire.admin-profile-tabs');
    }
}
