<?php

namespace App\Repositories;

use App\Models\User;

Class UserRepository {

    public function users(string $q = null) {
        $users = User::query();
        $searchFields = [
            'name',
            'email',
        ];

        if($q) {
            foreach($searchFields as $searchField) {
                $users->orWhere($searchField, 'LIKE', '%' . $q . '%');
            }
        }

        return $users;
    }
}
