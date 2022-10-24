<?php

namespace dao\user;

use model\User;
use dao\IDaoTemplate;

interface IUserDao extends IDaoTemplate{

    public function changeStatus( User $entidad):int;
    public function validateUser(User $entidad);
}
