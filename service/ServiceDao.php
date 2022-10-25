<?php

namespace service;

use dao\Dao;

class ServiceDao{
    private Dao $dao;

    public function __construct(Dao $dao)
    {
        $this->dao = $dao;
    }

    public function getAll($tableName){
        return $this->dao->getAll($tableName);
    }

    public function getAllTablesName(){
        return $this->dao->getAllTablesName();
    }
}
