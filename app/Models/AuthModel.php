<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	protected $db;

	function  __construct()
	{
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

	public function adminLogin(string $username, string $password)
	{
		$admin = $this->db->table('admin')
			->where('user', $username)
			->get()
			->getRow();

		if (!$admin) {
			return ['error' => 1, 'msg' => 'Usuario Incorrecto', 'data' => []];
		}

		if (!password_verify($password, $admin->password)) {
			return ['error' => 1, 'msg' => 'Contraseña Incorrecta', 'data' => []];
		}

		return ['error' => 0, 'msg' => 'Login exitoso', 'data' => $admin];
	}
}
