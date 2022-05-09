<?php

namespace Creativolab\App\Repositories\Profession;

use Creativolab\App\Models\Profession;
use Creativolab\App\Models\User;

interface ProfessionRepositoryInterface {

    /**
     * Search for the user's profession
     * @param User $user
     * @return Profession $profession
    */
    public function getProfessionByUserId(User $user) : Profession;

}