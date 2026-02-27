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

    protected $region;

    protected $availableRegions = ['US']; // regiones donde sí se puede ordenar

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
        # Detectar región
        $this->region = $this->detectRegion();
    }

    private function detectRegion()
    {
        $ip = $this->objRequest->getIPAddress();

        // En local siempre será 127.0.0.1 → forzamos US para desarrollo
        if ($ip == '127.0.0.1' || $ip == '::1') {
            return 'US';
        }

        try {
            $response = file_get_contents("http://ip-api.com/json/{$ip}");
            $data = json_decode($response);

            if ($data && $data->status === 'success') {
                return $data->countryCode; // ES, US, MX, etc.
            }
        } catch (\Exception $e) {
            return 'UNKNOWN';
        }

        return 'UNKNOWN';
    }

    public function landing()
    {
        $products = $this->objMainModel->getProducts();
        $categories = $this->objMainModel->getCategories();

        $regionAvailable = in_array($this->region, $this->availableRegions);

        $data = [
            'products' => $products,
            'categories' => $categories,
            'region' => $this->region,
            'regionAvailable' => $regionAvailable
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

        if (!in_array($this->region, $this->availableRegions)) {
            return $this->response->setJSON([
                'error' => 1,
                'message' => 'Región no permitida'
            ]);
        }

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
