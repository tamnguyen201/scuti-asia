<?php
namespace App\Repositories\User;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\User::class;
    }
}
