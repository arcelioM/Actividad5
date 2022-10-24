<?php

namespace dao;

use model\User;

interface IUserDao extends IDaoTemplate{

    public function delete( User $entidad):int;
}
