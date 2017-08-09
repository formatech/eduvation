<?php

namespace App\Repositories;

class Users {
	
	private $users;

    public function __construct () {
    
        $this->users = [
            (object) ['id' => 1, 'name' => 'gilbert', 'age' => 28],
            (object) ['id' => 2, 'name' => 'ghenoie', 'age' => 35],
            (object) ['id' => 3, 'name' => 'sohpie', 'age' => 13],
            (object) ['id' => 77, 'name' => 'user 77', 'age' => 13],
        ];

    }
	
	function all() {
		return $this->users;
	}
	
	function find($id) {
		
		foreach ($this->users as $user) {
			if($user->id === $id) {
				return $user;
			}
		}
		
		return null;
	}
	
	function delete($id) {
		
		$users = [];
		
		foreach($this->users as $user) {
			if($user->id !== $id) {
				$users[] = $user;
			}
		}
		
		$this->users = $users;
	}
	
	function create($user) {
		$this->users[] = $user;
	}
	
}
