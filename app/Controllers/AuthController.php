<?php

namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $objSession;
    protected $objRequest;
    protected $objAuthModel;

    public function __construct()
    {
        # Session
        $this->objSession = session();
        # Services
        $this->objRequest = \Config\Services::request();
        # Models
        $this->objAuthModel = new AuthModel;
    }

    public function adminLoginProccess()
    {
        $username = $this->objRequest->getPost('username');
        $password = $this->objRequest->getPost('password');

        $admin = $this->objAuthModel->adminLogin($username, $password);

        if ($admin['error'] == 1) {
            $result['error'] = 1;
            $result['msg'] = $admin['msg'];
            return json_encode($result);
        }

        # Create Session
        $session = [];
        $session = [
            'admin_id'   => $admin['data']->id,
            'admin_user' => $admin['data']->user,
            'admin_email' => $admin['data']->email,
            'is_admin'   => true
        ];

        $this->objAuthModel->updateLastSession($admin['data']->id);

        $this->objSession->set($session);

        $result = [];
        $result['error'] = 0;

        return json_encode($result);
    }
}
