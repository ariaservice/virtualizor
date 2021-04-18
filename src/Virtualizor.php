<?php


namespace Ariaservice\Virtualizor;

use Ariaservice\Virtualizor\sdk\Virtualizor_Admin_API;
use Ariaservice\Virtualizor\sdk\Virtualizor_Enduser_API;

class Virtualizor{

    public $virtualizorEnduser;
    public $virtualizoAdmin;

    public function __construct($config = [],$server=null)
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
    }

    public function serviceDetails($vpsId){
        return $this->virtualizorEnduser->vpsmanage((int) $vpsId);
    }
}
