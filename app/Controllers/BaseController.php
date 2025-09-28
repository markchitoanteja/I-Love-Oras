<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
use Psr\Log\LoggerInterface;
use App\Libraries\DatabaseInitializer;
use App\Models\UserSession_Model;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    /** @var Session */
    protected $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        DatabaseInitializer::initialize();

        // Properly initialize session
        $this->session = session();

        $this->trackUser();
    }

    protected function trackUser()
    {
        $ip        = $this->request->getIPAddress();
        $agent     = (string) $this->request->getUserAgent();
        $sessionId = $sessionId = session_id();

        $userSessionModel = new UserSession_Model();

        $existing = $userSessionModel
            ->where('session_id', $sessionId)
            ->first();

        if ($existing) {
            $userSessionModel->update($existing['id'], [
                'last_activity' => date('Y-m-d H:i:s')
            ]);
        } else {
            $userSessionModel->insert([
                'session_id'    => $sessionId,
                'ip_address'    => $ip,
                'user_agent'    => $agent,
                'last_activity' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
