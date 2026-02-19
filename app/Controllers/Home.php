<?php

namespace App\Controllers;

use App\Models\MainModel;

use Resend;
use GuzzleHttp\Client;

class Home extends BaseController
{
    protected $objSession;
    protected $objRequest;
    protected $objMainModel;

    protected $resend;

    public function __construct()
    {
        # Session
        $this->objSession = session();
        # Services
        $this->objRequest = \Config\Services::request();
        # Models
        $this->objMainModel = new MainModel;
        # Resend
        $this->resend = Resend::client(env('RESEND_API_KEY'));
    }

    public function landing()
    {
        $products = $this->objMainModel->getProducts();
        $categories = $this->objMainModel->getCategories();

        $data = [
            'products' => $products,
            'categories' => $categories
        ];

        $this->resend->emails->send([
            'from' => 'Acme <onboarding@resend.dev>',
            'to' => ['miguelalejandro230902@gmail.com'],
            'subject' => 'hello world',
            'html' => '<strong>it works!</strong>',
        ]);

        return view('home/landing', $data);
    }

    public function makeOrder()
    {
        $client_name = $this->objRequest->getPost('client_name');
        $client_phone = $this->objRequest->getPost('client_phone');
        $products = $this->objRequest->getPost('products');
        $total_price = $this->objRequest->getPost('total_price');
        $orderID = 'LC-' . random_int(1000000, 9999999);

        $data = [
            'client_name' => $client_name,
            'client_phone' => $client_phone,
            'products' => $products,
            'order_id' => $orderID,
            'total_price' => $total_price
        ];

        $result = $this->objMainModel->makeOrder($data);

        return $this->response->setJSON($result);
    }

    public function adminLogin()
    {
        return view('admin/auth/login');
    }
}
