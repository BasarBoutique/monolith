<?php

namespace App\Repositories;

use App\Models\User;

class UserSearchRepository
{

    private $users;

    public function __construct()
    {
        $this->users = (new User);
    }


    public function makeQuery(array $query)
    {
        $this->withDisabledUsers($query['withDisabled'] ?? false);
        $this->filterByRoles($query['roles'] ?? []);
        $this->filterByName($query['name'] ?? '');
        $this->users->load('detail');

    }

    public function orderBy(array $order)
    {

        switch($order['sort_by']) {
            case 'role':
                break;
            case 'name':
                break;
            case 'created':
                break;
        }

    }

    public function paginateSearch(int $limit = 20)
    {
        return $this->users->paginate($limit);
    }

    private function withDisabledUsers($withDisabled)
    {
        $withDisabled = filter_var($withDisabled, FILTER_VALIDATE_BOOLEAN);

        if($withDisabled) {
            $this->users->withDisabledUsers();
        }
    }

    private function filterByRoles(array $roles)
    {
        if(isset($roles) && !empty($roles)) {
            $this->users->whereHas('roles', function ($q) use ($roles) {
                $q->select('permission_users.user_id')->whereIn('permission_users.user_id', $roles);
            });
        }
    }

    private function filterByName(string $name)
    {
        if(!!$name && isset($name) && strlen($name) > 3) {

            $this->users->searchByName($name);
        }

    }

}
