<?php

namespace App\Repositories\School;

use App\Repositories\Base\BaseInterface;

interface SchoolInterface extends BaseInterface{

    public function updatSiksaPathAdmin($array, $image);

    public function active();
}
