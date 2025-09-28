<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\DatabaseInitializer;
use App\Models\UserSession_Model;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        DatabaseInitializer::initialize();
        $this->trackUser();
    }

    protected function trackUser()
    {
        $ip    = $this->request->getIPAddress();
        $agent = (string) $this->request->getUserAgent();

        $userSessionModel = new UserSession_Model();

        $existing = $userSessionModel
            ->where('ip_address', $ip)
            ->where('user_agent', $agent)
            ->first();

        if ($existing) {
            $userSessionModel->update($existing['id'], [
                'last_activity' => date('Y-m-d H:i:s')
            ]);
        } else {
            $userSessionModel->insert([
                'ip_address'    => $ip,
                'user_agent'    => $agent,
                'last_activity' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
