<?php

namespace App\Controllers;

use App\Models\MainModel;

use Resend;

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

        if (isset($result['error']) && $result['error'] == 0) {

            $orderId = $result['id'];

            $order = $this->objMainModel->getOrder($orderId);

            if ($order) {

                $emailHTML = view('emails/new_order', ['order' => $order]);

                $this->resend->emails->send([
                    'from' => 'La Cubana Pizzería <info@lacubanapizzeria.com>',
                    'to' => [env('RESEND_EMAIL_TO')],
                    'subject' => 'Nueva orden #' . $order->order_id,
                    'html' => $emailHTML,
                ]);
            }
        }

        return $this->response->setJSON($result);
    }

    public function adminLogin()
    {
        return view('admin/auth/login');
    }
}
