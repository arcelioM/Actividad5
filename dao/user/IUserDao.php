<?php

namespace dao\user;

use model\User;
use dao\IDaoTemplate;

interface IUserDao extends IDaoTemplate{

    public function delete( User $entidad):int;
}
