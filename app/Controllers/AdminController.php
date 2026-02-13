<?php

namespace App\Controllers;

use App\Models\MainModel;

class AdminController extends BaseController
{
    protected $objSession;
    protected $objRequest;
    protected $objMainModel;

    public function __construct()
    {
        # Session
        $this->objSession = session();
        # Services
        $this->objRequest = \Config\Services::request();
        # Models
        $this->objMainModel = new MainModel;
    }

    ## DASHBOARD

    public function dashboard()
    {
        $data = [];
        $data['products'] = $this->objMainModel->getProducts();
        $data['categories'] = $this->objMainModel->getCategories();
        $data['dashboard_active'] = true;
        $data['page'] = view('admin/home/dashboard', $data);

        return view('admin/mainAdmin', $data);
    }

    public function updateProduct()
    {
        $id = $this->objRequest->getPost('id');
        $name = $this->objRequest->getPost('name');
        $description = $this->objRequest->getPost('description');
        $price = $this->objRequest->getPost('price');
        $new_price = $this->objRequest->getPost('new_price');
        $popular = $this->objRequest->getPost('popular');

        $data = [];
        $data['name'] = $name;
        $data['description'] = $description;
        $data['price'] = $price;
        $data['new_price'] = $new_price;
        $data['popular'] = $popular;

        $result = $this->objMainModel->updatePizza($id, $data);

        return $this->response->setJSON($result);
    }

    public function deleteProduct()
    {
        $id     = $this->objRequest->getPost('id');
        $imgURL = $this->objRequest->getPost('imgURL');

        $result = $this->objMainModel->deletePizza($id);

        if (isset($result['error']) && $result['error'] == 0) {

            if (!empty($imgURL)) {
                $imagePath = FCPATH . str_replace('public/', '', $imgURL);
                if (
                    file_exists($imagePath) &&
                    strpos(realpath($imagePath), realpath(FCPATH . 'images/pizzas')) === 0
                ) {
                    @unlink($imagePath);
                }
            }
        }

        return $this->response->setJSON($result);
    }

    public function addProduct()
    {
        $file = $this->request->getFile('image');

        if (!$file) {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Archivo no recibido'
            ]);
        }

        if ($file->getError() !== UPLOAD_ERR_OK) {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Error upload: ' . $file->getError()
            ]);
        }

        // Validar tipo de imagen (extra recomendado)
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Formato de imagen no permitido'
            ]);
        }

        // Datos del formulario
        $name        = trim($this->request->getPost('name'));
        $description = trim($this->request->getPost('description'));
        $price       = $this->request->getPost('price');
        $new_price   = $this->request->getPost('new_price') ?: 0;
        $category_id = $this->request->getPost('category_id');

        // Validaciones básicas
        if ($name === '' || $description === '' || !is_numeric($price) || empty($category_id)) {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Datos inválidos'
            ]);
        }

        // 🔥 GENERAR NOMBRE ÚNICO CON MICROTIME
        $extension = $file->getExtension(); // png, jpg, etc
        $uniqueName = uniqid((string) microtime(true), true);
        $fileName   = $uniqueName . '.' . $extension;

        // 📁 Mover archivo a public/images/pizzas
        $file->move(FCPATH . 'images/pizzas', $fileName);

        // Guardar en BD (solo nombre.extensión)
        $this->objMainModel->objCreate('products', [
            'img'        => $fileName,
            'name'       => $name,
            'description' => $description,
            'price'      => number_format((float)$price, 2, '.', ''),
            'new_price'  => number_format((float)$new_price, 2, '.', ''),
            'popular'    => 0,
            'category_id'   => $category_id
        ]);

        return $this->response->setJSON([
            'error' => 0
        ]);
    }

    public function addCategory()
    {
        $name = trim($this->request->getPost('name'));

        if ($name === '') {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Nombre de categoría es obligatorio'
            ]);
        }

        $this->objMainModel->objCreate('categories', [
            'name' => $name
        ]);

        return $this->response->setJSON([
            'error' => 0
        ]);
    }

    ## ORDERS

    public function orders()
    {
        $data = [];
        $data['orders'] = $this->objMainModel->getOrders();
        $data['orders_active'] = true;
        $data['page'] = view('admin/home/orders', $data);

        return view('admin/mainAdmin', $data);
    }

    public function updateOrderStatus()
    {
        $order_id = $this->objRequest->getPost('order_id');
        $status = $this->objRequest->getPost('status');

        $result = $this->objMainModel->updateOrderStatus($order_id, $status);

        return $this->response->setJSON($result);
    }

    ## ADMINS

    public function admins()
    {
        $data = [];
        $data['admins'] = $this->objMainModel->getAdmins();
        $data['admins_active'] = true;
        $data['page'] = view('admin/home/admins', $data);

        return view('admin/mainAdmin', $data);
    }

    public function addAdmin()
    {
        $name = trim($this->objRequest->getPost('name'));
        $email = trim($this->objRequest->getPost('email'));
        $password = trim($this->objRequest->getPost('password'));

        if ($name === '' || $email === '' || $password === '') {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Todos los campos son obligatorios'
            ]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'Email no válido'
            ]);
        }

        // Verificar si el email ya existe
        if ($this->objMainModel->getAdminByEmail($email)) {
            return $this->response->setJSON([
                'error' => 1,
                'msg'   => 'El email ya está registrado'
            ]);
        }

        // Hashear contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Guardar en BD
        $this->objMainModel->objCreate('admin', [
            'user' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        return $this->response->setJSON([
            'error' => 0
        ]);
    }

    public function logout()
    {
        $this->objSession->destroy();
        return $this->response->setJSON(['ok' => true]);
    }
}
