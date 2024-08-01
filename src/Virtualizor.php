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

    public function manageInstance($vpsId,$data = []){
        $data['vpsid'] = (int) $vpsId;
        return $this->virtualizoAdmin->managevps($data);
    }

    public function getInstances($page=0,$resLen=50){
        return $this->virtualizoAdmin->listvs();
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

    public function startInstance($vid){
        return $this->virtualizoAdmin->start($vid);
    }

    public function stopInstance($vid){
        return $this->virtualizoAdmin->stop($vid);
    }

    public function restartInstance($vid){
        return $this->virtualizoAdmin->restart($vid);
    }

    public function powerOffInstance($vid){
        return $this->virtualizoAdmin->poweroff($vid);
    }

    public function suspendInstance($vid){
        return $this->virtualizoAdmin->suspend($vid);
    }

    public function unsuspendInstance($vid){
        return $this->virtualizoAdmin->unsuspend($vid);
    }

    public function changePasswordInstance($vid,$password){
        $return = $this->virtualizorEnduser->changepassword($vid,$password);
        $this->virtualizoAdmin->restart($vid);

        return $return;
    }

    public function osreinstallInstance($osId,$password,$vid){
        $post['reinsos'] = 1;
        $post['newos'] = $osId;
        $post['newpass'] = $password;
        $post['conf'] = $post['newpass'];
        return $this->virtualizorEnduser->os($post,$vid);
    }

    public function changeVncPasswordInstance($newPassword,$vid){

        $return =  $this->virtualizorEnduser->vncpass($newPassword,$vid);

        $this->virtualizoAdmin->restart($vid);

        return $return;
    }
}

