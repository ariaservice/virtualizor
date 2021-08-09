<?php


namespace Ariaservice\Virtualizor;

use Ariaservice\Virtualizor\sdk\Virtualizor_Admin_API;
use Ariaservice\Virtualizor\sdk\Virtualizor_Enduser_API;

class Virtualizor{

    public $virtualizorEnduser;
    public $virtualizoAdmin;

    public function __construct($config = [],$is_admin=0)
    {
         $this->virtualizorEnduser = new Virtualizor_Enduser_API(
             $config['ip'],
             $config['key'],
             $config['password']

         );

         $this->virtualizoAdmin    = new Virtualizor_Admin_API(
             $config['ip'],
             $config['key'],
             $config['password']);

    
         $this->virtualizorEnduser->is_admin = $is_admin;
    }

    public function serviceDetails($vpsId){
        return $this->virtualizorEnduser->vpsmanage((int) $vpsId);
    }

    public function createInstance($post = []){
       //https://www.virtualizor.com/docs/admin-api/create-vps/

        $post['virt'] = 'kvm';

         return $this->virtualizoAdmin->addvs_v2($post);
    }

    public function deleteInstance($vid){
        return $this->virtualizoAdmin->delete_vs($vid);
    }
}

