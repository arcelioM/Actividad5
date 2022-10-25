<?php

namespace service\user;

use model\User;

interface IServiceUser{

    public function changeStatus( User $entidad):int;
    public function validateUser(User $entidad);
    public function getByNombre(String $nombre);
}
