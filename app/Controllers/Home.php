<?php

namespace App\Controllers;

use App\Models\MainModel;

class Home extends BaseController
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

    public function index()
    {
        $pizzas = $this->objMainModel->getPizzas();

        $data = [
            'pizzas' => $pizzas
        ];

        return view('home/landing', $data);
    }
}
