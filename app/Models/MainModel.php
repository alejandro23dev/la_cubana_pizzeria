<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
	protected $db;

	function  __construct()
	{
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

	public function objCreate($table, $data)
	{
		$this->db->table($table)->insert($data);

		$result = array();
		if ($this->db->resultID) {
			$result['error'] = 0;
			$result['id'] = $this->db->connID->insert_id;
		} else {
			$result['error'] = 1;
		}

		return $result;
	}

	public function objUpdate($table, $data, $id)
	{
		$query = $this->db->table($table)->where('id', $id)->update($data);

		$result = array();
		if ($query == true) {
			$result['error'] = 0;
			$result['id'] = $id;
		} else {
			$result['error'] = 1;
		}

		return $result;
	}

	public function getPizzas()
	{
		return  $this->db->table('pizzas')
			->get()->getResult();
	}

	public function updatePizza($id, $data)
	{
		return $this->objUpdate('pizzas', $data, $id);
	}

	public function deletePizza($id)
	{
		$query = $this->db->table('pizzas')->where('id', $id)->delete();

		$result = array();
		if ($query == true) {
			$result['error'] = 0;
			$result['id'] = $id;
		} else {
			$result['error'] = 1;
		}

		return $result;
	}

	public function getOrders()
	{
		return  $this->db->table('orders')
			->get()->getResult();
	}

	public function getAdmins()
	{
		return  $this->db->table('admin')
			->get()->getResult();
	}
}
