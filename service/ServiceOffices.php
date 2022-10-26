<?php

namespace service;

use dao\DaoOffices;

class ServiceOffices implements IServiceTemplate{
    private DaoOffices $DaoOfficces;

    public function __construct(DaoOffices $DaoOfficces)
    {
        $this->DaoOfficces = $DaoOfficces;
    }


    public function getAll(){
        return $this->DaoOfficces->getAll();
    }
    public function getByID($id){
        return $this->DaoOfficces->getByID($id);
    }
    public function save($entidad):int{
        return $this->DaoOfficces->save($entidad);
    }
    public function update($entidad):int{
        return $this->DaoOfficces->update($entidad);
    }

    public function getByCity($city){
        return $this->DaoOfficces->getByCity($city);
    }
}
