<?php

namespace App\Livewire;

use Illuminate\Console\View\Components\Alert;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileTabs extends Component
{
    public $tab=null;
    public $tabname='personal_details';
    protected $queryString= ['tab'];
    public $name, $email,$username,$admin_id;
    public $current_password,$new_password,$confirm_password;
    public function selectTab($tab){
        $this->tab=$tab;
    }
    public function mount()
    {
        $this->tab = request()->exists('tab') ? request()->tab() : $this->tabname;

        if (Auth::guard('admin')->check()) {
            $admin = Admin::findOrFail(auth()->id());
            $this->admin_id = $admin->id;
            $this->name = $admin->name;
            $this->email = $admin->email;
            $this->username = $admin->username;
        }
    }
    public function updatetAdminPersonalDetails(){
        $this->validate([
            'name'=> 'required|min:3',
            'email'=> 'required|email|unique:admins,email,'.$this->admin_id,
            'username'=> 'required|min:3|unique:admins,username,'.$this->admin_id,
        ]);
        Admin::find($this->admin_id)
                ->update([
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'username'=>$this->username
                ]);
        //For auto Update 
        $this->dispatch('updateAdminSellerHeaderInfo');
        $this->dispatchBrowserEvent('updateAdminInfo',[
            'adminName'=>$this->name,
            'adminEmail'=>$this->email
        ]);
         $this->showToastr('success','your personal dettails have been successfully updated.');
       
    }
    public function showToastr($type,$message){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }
    protected function dispatchBrowserEvent($event, $data = [])
{
    $this->dispatch('browser-event', [
        'event' => $event,
        'data' => $data,
    ]);
}
    public function updatePassword(){
        $this->validate([
            'current_password'=>[
                'required',function($attribute, $value, $fail) {
                    if(!Hash::check($value, Admin::find(auth('admin')->id())->password)){
                        return $fail(__('The Current password is incorrect'));
                    }
                }
            ],
            'new_password'=>'required|min:2|max:45',
        ]);
        $query=Admin::findOrFail(auth('admin')->id())
        ->update([
            'password'=>Hash::make($this->new_password),
        ]);
        if($query){
            $this->current_password=$this->new_password=$this->confirm_password=null;
            $this->showToastr('success','Password successfull changed');
            //session()->flash('success','updated password');
        }else{
            $this->alert('Something went to wrong');
        }
    }
    public function render()
    {
        return view('livewire.admin-profile-tabs');
    }

}
