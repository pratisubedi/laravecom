<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GeneralSetting;
use Illuminate\Session;
use App\Models\SocialNetwork;
class AdminSetting extends Component
{
    public $tab=null;
    public $default_tab='general_settings';
    protected  $queryString=['tab'];
    public $site_name,$site_email,$site_phone ,$site_meta_keywords,$site_meta_description,$site_logo,$site_favicon;
    public $facebook_url,$youtube_url, $twitter_url,$github_url,$instagram_url,$linkedin_url;
    public function selectTab($tab){
        $this->tab=$tab;
    }

    public function mount(){
        $this->tab=request()->tab ? request()->tab : $this->default_tab;
        $this->site_name=get_settings()->site_name;
        $this->site_email=get_settings()->site_email;
        $this->site_phone=get_settings()->site_phone;
        $this->site_meta_keywords=get_settings()->site_meta_keywords;
        $this->site_meta_description=get_settings()->site_meta_description;
        $this->sit_logo=get_settings()->sit_logo;
        $this->site_favicon=get_settings()->site_favicon;
        //


        //populate social network

        $this->facebook_url=get_social_network()->facebook_url;
        $this->twitter_url=get_social_network()->twitter_url;
        $this->instagram_url=get_social_network()->instagram_url;
        $this->linkedin_url=get_social_network()->linkedin_url;
        $this->youtube_url=get_social_network()->youtube_url;
        $this->github_url=get_social_network()->github_url;
    }
    public function updateGeneralSettings(){
        $this->validate([
            'site_name'=>'required',
            'site_email'=> 'required|email',
        ]);
        $settings=new GeneralSetting();
        $settings=$settings->first();
        $settings->site_name=$this->site_name;
        $settings->site_email=$this->site_email;
        $settings->site_phone=$this->site_phone;
        $settings->site_meta_keywords=$this->site_meta_keywords;
        $settings->site_meta_description=$this->site_meta_description;
        $update=$settings->update();
        if($update) {
            echo "good";
            return back();
        }else{
            echo "Bad work";
            return back();
        }

    }
    public function updateSocialNetworks(){
       $social_network=new SocialNetwork();
       $social_network->facebook_url=$this->facebook_url;
       $social_network->twitter_url=$this->twitter_url;
       $social_network->linkedin_url=$this->linkedin_url;
       $social_network->youtube_url=$this->youtube_url;
       $social_network->lnstagram_url=$this->lnstagram_url;
       $social_network->github_url=$this->github_url;
       $update=$social_network->save();
       if($update) {
        echo "good";
       }else{
        echo "false";
       }
    }
    public function render()
    {
        return view('livewire.admin-setting');
    }
}
