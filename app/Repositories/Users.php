<?php

namespace App\Repositories;

class Users {
	
	private $users;
	private $lastId = 1;

    public function __construct () {
        // session()->flush();
		$this->load();
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
		
		$this->persist();
	}
	
	function create($user) {

		$user['id'] = $this->lastId++;

		$this->users[] = (object) $user;

		$this->persist();
	}

	private function persist() {
		
		session([
			'users' => $this->users,
			'lastId' => $this->lastId,
		]);
		
	}

	private function load() {
		
		$this->users = session('users');
		$this->lastId = session('lastId');

		if($this->users === null) {
			$this->users = [];
		}

		if($this->lastId === null) {
			$this->lastId = 1;
		}

		

	}
	
}
