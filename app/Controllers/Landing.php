<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\Attraction_Model;
use App\Models\Gallery_Model;
use App\Models\Message_Model;
use App\Models\Event_Model;
use App\Models\Log_Model;

class Landing extends BaseController
{
    public function __construct()
    {
        $this->updateEventStatuses();
    }

    /**
     * Automatically update events status based on date and time.
     */
    private function updateEventStatuses()
    {
        $eventsModel = new Event_Model();
        $events = $eventsModel->findAll();

        $now = date('Y-m-d H:i:s');

        foreach ($events as $event) {
            $eventStart = $event['date'] . ' ' . $event['start_time'];
            $eventEnd   = $event['date'] . ' ' . ($event['end_time'] ?? '23:59:59');

            $newStatus = $event['status']; // default, only change if needed

            if ($now < $eventStart) {
                $newStatus = 'upcoming';
            } elseif ($now >= $eventStart && $now <= $eventEnd) {
                $newStatus = 'ongoing';
            } elseif ($now > $eventEnd) {
                $newStatus = 'completed';
            }

            // Update only if status has changed
            if ($newStatus !== $event['status']) {
                $eventsModel->update($event['id'], ['status' => $newStatus]);
            }
        }
    }

    private function addLog($action, $type)
    {
        $logModel = new Log_Model();

        $data = [
            'action'     => $action,
            'type'       => $type,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $logModel->insert($data);
    }

    public function index()
    {
        session()->set('page', 'home');
        session()->set('page_title', 'Home');

        $eventsModel = new Event_Model();
        $attractionModel = new Attraction_Model();

        // Fetch by categories with ordering
        $ongoing  = $eventsModel->where('status', 'ongoing')->orderBy('date', 'ASC')->findAll();
        $upcoming = $eventsModel->where('status', 'upcoming')->orderBy('date', 'ASC')->findAll();
        $past     = $eventsModel->where('status', 'completed')->orderBy('date', 'DESC')->findAll();

        // Build featured events list
        $featured = [];

        // 1. Add ongoing
        foreach ($ongoing as $event) {
            if (count($featured) < 3) {
                $featured[] = $event;
            }
        }

        // 2. Fill with upcoming if needed
        foreach ($upcoming as $event) {
            if (count($featured) < 3) {
                $featured[] = $event;
            }
        }

        // 3. Fill with past if still less than 3
        foreach ($past as $event) {
            if (count($featured) < 3) {
                $featured[] = $event;
            }
        }

        // 🔹 Fetch top 3 attractions (latest/desc by ID)
        $topAttractions = $attractionModel
            ->orderBy('id', 'DESC')
            ->findAll(3); // Limit directly to 3

        $data = [
            'featured'      => $featured,
            'attractions'   => $topAttractions
        ];

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return view('landing/home', $data);
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return view('landing/home', $data);
    }

    public function about_oras()
    {
        session()->set('page', 'about_oras');
        session()->set('page_title', 'About Oras');

        $header = view('landing/layouts/header');
        $body = view('landing/about_oras');
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function history()
    {
        session()->set('page', 'history');
        session()->set('page_title', 'History of Oras');

        $header = view('landing/layouts/header');
        $body = view('landing/history');
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function mayor()
    {
        session()->set('page', 'mayor');
        session()->set('page_title', 'Mayor of Oras');

        $header = view('landing/layouts/header');
        $body = view('landing/mayor');
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function barangays()
    {
        session()->set('page', 'barangays');
        session()->set('page_title', 'Barangays');

        $header = view('landing/layouts/header');
        $body = view('landing/barangays');
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function economy()
    {
        session()->set('page', 'economy');
        session()->set('page_title', 'Economy');

        $header = view('landing/layouts/header');
        $body = view('landing/economy');
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function events()
    {
        session()->set('page', 'events');
        session()->set('page_title', 'Events');

        $eventsModel = new Event_Model();

        $upcoming = $eventsModel->where('status', 'upcoming')->orderBy('date', 'ASC')->findAll();
        $ongoing  = $eventsModel->where('status', 'ongoing')->orderBy('date', 'ASC')->findAll();
        $past     = $eventsModel->where('status', 'completed')->orderBy('date', 'DESC')->findAll();

        $data = [
            'upcoming' => $upcoming,
            'ongoing'  => $ongoing,
            'past'     => $past,
        ];

        $header = view('landing/layouts/header');
        $body   = view('landing/events', $data);
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function attractions()
    {
        session()->set('page', 'attractions');
        session()->set('page_title', 'Attractions');

        $Attraction_Model = new Attraction_Model();
        $attractions = $Attraction_Model->findAll();

        $data = [
            'attractions' => $attractions
        ];

        $header = view('landing/layouts/header');
        $body = view('landing/attractions', $data);
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function gallery()
    {
        session()->set('page', 'gallery');
        session()->set('page_title', 'Gallery');

        $Gallery_Model = new Gallery_Model();
        $images = $Gallery_Model->orderBy('id', 'DESC')->findAll();

        $header = view('landing/layouts/header');
        $body = view('landing/gallery', ['images' => $images]);
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function contact()
    {
        session()->set('page', 'contact');
        session()->set('page_title', 'Contact Us');

        $header = view('landing/layouts/header');
        $body = view('landing/contact');
        $footer = view('landing/layouts/footer');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return $header . $body . $footer;
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return $header . $body . $footer;
    }

    public function submit_contact_form()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $Message_Model = new Message_Model();

        $name    = $this->request->getPost('name');
        $email   = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        $data = [
            'name'       => $name,
            'email'      => $email,
            'message'    => $message,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($Message_Model->insert($data)) {
            $subject = "We have received your message - I❤️Oras";

            $body = '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>I❤️Oras Support</title>
            </head>
            <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:20px; color:#333;">
                <table width="100%" cellpadding="0" cellspacing="0" style="max-width:600px; margin:auto; background:#ffffff; border:1px solid #ddd; border-radius:6px;">
                    <tr>
                        <td style="background:#333; padding:15px; text-align:center; color:#ffffff; font-size:18px; font-weight:bold; border-radius:6px 6px 0 0;">
                            I❤️Oras Support
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:25px; font-size:15px; line-height:1.6; color:#444;">
                            <p>Dear <strong>' . htmlspecialchars($name) . '</strong>,</p>

                            <p>Thank you for reaching out to <strong>I❤️Oras</strong>. We have received your inquiry and our support team is currently reviewing it. One of our representatives will get back to you as soon as possible.</p>

                            <p>We appreciate your patience and trust in us. Our goal is to provide you with the best possible assistance.</p>

                            <p style="margin-top:25px;">Sincerely,<br>
                            <strong>I❤️Oras Support Team</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#f9f9f9; padding:15px; text-align:center; font-size:12px; color:#666; border-radius:0 0 6px 6px;">
                            This is an automated confirmation email. Please do not reply directly to this message.<br>
                            &copy; ' . date("Y") . ' I❤️Oras. All rights reserved.
                        </td>
                    </tr>
                </table>
            </body>
            </html>
            ';

            // Send email
            $emailSent = $this->send_email($email, $name, $subject, $body);

            session()->setFlashdata("notification", [
                "title" => "Success!",
                "text"  => "Message has been sent successfully.",
                "icon"  => "success"
            ]);
        } else {
            session()->setFlashdata("notification", [
                "title" => "Error!",
                "text"  => "Failed to send message.",
                "icon"  => "error"
            ]);
        }

        $this->addLog("User submitted a message", "Message");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Message processed.'
        ]);
    }

    public function get_event_details()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
        }

        $eventId = $this->request->getPost('id');

        $eventsModel = new Event_Model();
        $event = $eventsModel->find($eventId);

        if ($event) {
            return $this->response->setJSON([
                'success' => true,
                'event'   => $event
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Event not found.'
        ]);
    }

    private function send_email($receiver_email, $receiver_name, $subject, $body)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'support@essuc.online';
            $mail->Password   = '09465287111@Mark';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->CharSet = 'UTF-8';
            $mail->setFrom('support@essuc.online', 'I❤️Oras Support');
            $mail->addAddress($receiver_email, $receiver_name);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();

            return true;
        } catch (Exception $e) {
            log_message('error', 'Mailer Error: ' . $e->getMessage()); // log the error
            return false;
        }
    }
}
