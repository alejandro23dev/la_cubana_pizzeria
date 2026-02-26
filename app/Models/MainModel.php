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

	public function makeOrder($data)
	{
		return $this->objCreate('orders', $data);
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

	public function getProducts()
	{
		return  $this->db->table('products')
			->get()->getResult();
	}

	public function getCategories()
	{
		return  $this->db->table('categories')
			->get()->getResult();
	}

	public function updatePizza($id, $data)
	{
		return $this->objUpdate('products', $data, $id);
	}

	public function deletePizza($id)
	{
		$query = $this->db->table('products')->where('id', $id)->delete();

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
		$orders = $this->db->table('orders')->get()->getResult();

		if (empty($orders)) {
			return [];
		}

		foreach ($orders as &$order) {

			$order->products_readable = [];

			if (empty($order->products)) {
				continue;
			}

			// Decodificar JSON
			$products = json_decode($order->products, true);

			if (!is_array($products)) {
				continue;
			}

			// Obtener IDs
			$ids = array_column($products, 'id');

			if (empty($ids)) {
				continue;
			}

			// Consultar nombres de productos
			$items = $this->db->table('products')
				->select('id, name')
				->whereIn('id', $ids)
				->get()
				->getResultArray();

			// Mapear id => name
			$map = [];
			foreach ($items as $i) {
				$map[$i['id']] = $i['name'];
			}

			// Construir texto legible
			foreach ($products as $p) {
				if (isset($map[$p['id']])) {
					// Producto existe
					$order->products_readable[] =
						$p['quantity'] . ' - ' . $map[$p['id']];
				} else {
					// Producto eliminado
					$order->products_readable[] =
						$p['quantity'] . ' - Este producto ya no existe';
				}
			}
		}

		return $orders;
	}

	public function getOrder($id)
	{
		$order = $this->db->table('orders')
			->where('id', $id)
			->get()
			->getRow();

		if (!$order) {
			return null;
		}

		$order->products_readable = [];

		if (!empty($order->products)) {

			$products = json_decode($order->products, true);

			if (is_array($products)) {

				$ids = array_column($products, 'id');

				if (!empty($ids)) {

					$items = $this->db->table('products')
						->select('id, name')
						->whereIn('id', $ids)
						->get()
						->getResultArray();

					$map = [];
					foreach ($items as $i) {
						$map[$i['id']] = $i['name'];
					}

					foreach ($products as $p) {
						if (isset($map[$p['id']])) {
							$order->products_readable[] =
								$p['quantity'] . ' - ' . $map[$p['id']];
						} else {
							$order->products_readable[] =
								$p['quantity'] . ' - Este producto ya no existe';
						}
					}
				}
			}
		}

		return $order;
	}

	public function updateOrderStatus($id, $status)
	{
		$data = ['status' => $status];
		return $this->objUpdate('orders', $data, $id);
	}

	public function getAdmins()
	{
		return  $this->db->table('admin')
			->get()->getResult();
	}

	public function getAdminByEmail($email)
	{
		return  $this->db->table('admin')
			->where('email', $email)
			->get()->getRow();
	}

	public function getAdminById($id)
	{
		return  $this->db->table('admin')
			->where('id', $id)
			->get()->getRow();
	}

	public function getOneProductByCategoryId($category_id)
	{
		return $this->db->table('products')
			->where('category_id', $category_id)
			->limit(1)
			->get()
			->getRow();
	}

	public function objDelete($table, $id)
	{
		$query = $this->db->table($table)->where('id', $id)->delete();

		$result = array();
		if ($query == true) {
			$result['error'] = 0;
			$result['id'] = $id;
		} else {
			$result['error'] = 1;
		}

		return $result;
	}
}
