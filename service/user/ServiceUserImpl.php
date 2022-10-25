<?php

namespace service\user;

use dao\connection\Connection;
use dao\user\IUserDao;
use model\User;

class ServiceUserImpl implements IServiceUser{
    private IUserDao $userDao;

    public function __construct(IUserDao $userDao)
    {
        $this->userDao = $userDao;
    }

    

    public function getAll(){

        $users=$this->userDao->getAll(); 
        return $users;
    }
    public function getByID($id){

    }
    public function save($entidad):int{
        return 0;
    }
    public function update($entidad):int{
        return 0;
    }

    public function changeStatus( User $entidad):int{
        return 0;
    }
    public function validateUser(User $entidad){
        
        return $this->userDao->validateUser($entidad);;
    }
}
