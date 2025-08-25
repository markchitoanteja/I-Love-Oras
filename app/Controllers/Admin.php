<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User_Model;
use App\Models\Gallery_Model;
use App\Models\Message_Model;
use App\Models\Event_Model;
use App\Models\Attraction_Model;
use App\Models\Log_Model;

class Admin extends BaseController
{
    private function uploadProfileImage($file, $oldImage = null)
    {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'public/dist/admin/img/uploads/';

            // Move the file
            $file->move($uploadPath, $newName);

            // Optionally delete old image
            if (!empty($oldImage) && file_exists($uploadPath . $oldImage)) {
                unlink($uploadPath . $oldImage);
            }

            return $newName;
        }

        return false;
    }

    private function uploadImage($file, string $directory)
    {
        $uploadPath = FCPATH . $directory;

        try {
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            return $newName;
        } catch (\Exception $e) {
            log_message('error', 'Upload failed: ' . $e->getMessage());
            return false;
        }
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
        return redirect()->to(base_url('admin/dashboard'));
    }

    public function dashboard()
    {
        if (!session()->has('user')) {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'You must log in first!',
            ]);

            return redirect()->to(base_url());
        }

        session()->set("current_page", "dashboard");
        session()->set("current_page_title", "Dashboard");

        $user = session()->get('user');

        if (!isset($user['user_type']) || $user['user_type'] !== 'admin') {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'Access denied! Admins only.',
            ]);

            return redirect()->to(base_url());
        }

        // ===== Models =====
        $eventModel       = new Event_Model();
        $galleryModel     = new Gallery_Model();
        $logModel         = new Log_Model();
        $touristSpotModel = new Attraction_Model();

        $count_data = [
            'total_events'     => $eventModel->countAll(),
            'total_gallery'   => $galleryModel->countAll(),
            'total_tourist_spots'     => $touristSpotModel->countAll(),
        ];

        $logs = $logModel->orderBy('id', 'DESC')->findAll();

        // ===== Pass to view =====
        $header = view('admin/layouts/header');
        $body   = view('admin/dashboard', ['logs' => $logs, 'count_data' => $count_data]);
        $footer = view('admin/layouts/footer');

        return $header . $body . $footer;
    }

    public function events()
    {
        if (!session()->has('user')) {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'You must log in first!',
            ]);

            return redirect()->to(base_url());
        }

        session()->set("current_page", "events");
        session()->set("current_page_title", "Events");

        $user = session()->get('user');

        if (!isset($user['user_type']) || $user['user_type'] !== 'admin') {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'Access denied! Admins only.',
            ]);

            return redirect()->to(base_url());
        }

        // Load events from database (order by id desc)
        $eventModel = new Event_Model();
        $events = $eventModel->orderBy('id', 'DESC')->findAll();

        // Pass data into the view
        $header = view('admin/layouts/header');
        $body = view('admin/events', ['events' => $events]);
        $footer = view('admin/layouts/footer');

        return $header . $body . $footer;
    }

    public function tourist_spots()
    {
        if (!session()->has('user')) {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'You must log in first!',
            ]);

            return redirect()->to(base_url());
        }

        session()->set("current_page", "tourist_spots");
        session()->set("current_page_title", "Tourist Spots");

        $Attraction_Model = new Attraction_Model();
        $attractions = $Attraction_Model->orderBy('id', 'DESC')->findAll();

        $header = view('admin/layouts/header');
        $body = view('admin/tourist_spots', ['attractions' => $attractions]);
        $footer = view('admin/layouts/footer');

        $user = session()->get('user');

        if (!isset($user['user_type']) || $user['user_type'] !== 'admin') {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'Access denied! Admins only.',
            ]);

            return redirect()->to(base_url());
        }

        return $header . $body . $footer;
    }

    public function photo_gallery()
    {
        if (!session()->has('user')) {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'You must log in first!',
            ]);

            return redirect()->to(base_url());
        }

        session()->set("current_page", "photo_gallery");
        session()->set("current_page_title", "Photo Gallery");

        $Gallery_Model = new Gallery_Model();
        $images = $Gallery_Model->orderBy('id', 'DESC')->findAll();

        $header = view('admin/layouts/header');
        $body = view('admin/photo_gallery', ['images' => $images]);
        $footer = view('admin/layouts/footer');

        $user = session()->get('user');

        if (!isset($user['user_type']) || $user['user_type'] !== 'admin') {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'Access denied! Admins only.',
            ]);

            return redirect()->to(base_url());
        }

        return $header . $body . $footer;
    }

    public function communication()
    {
        if (!session()->has('user')) {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'You must log in first!',
            ]);

            return redirect()->to(base_url());
        }

        session()->set("current_page", "communication");
        session()->set("current_page_title", "Communication");

        $user = session()->get('user');

        if (!isset($user['user_type']) || $user['user_type'] !== 'admin') {
            session()->setFlashdata([
                'type' => 'error',
                'message' => 'Access denied! Admins only.',
            ]);

            return redirect()->to(base_url());
        }

        // Load your Messages model
        $Message_Model = new Message_Model();

        $messages = $Message_Model->orderBy('id', 'DESC')->findAll();

        // Pass messages to the body view
        $header = view('admin/layouts/header');
        $body = view('admin/communication', ['messages' => $messages]);
        $footer = view('admin/layouts/footer');

        return $header . $body . $footer;
    }

    public function update_profile()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
        }

        $userModel = new User_Model();
        $user = session()->get('user');
        $userId = $user['id'];

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $image = $this->request->getFile('image');

        $errors = [];

        // Email uniqueness check
        $existing = $userModel
            ->where('email', $email)
            ->where('id !=', $userId)
            ->first();

        if ($existing) {
            $errors['email'] = 'Email is already taken.';
        }

        if (!empty($errors)) {
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }

        // Prepare update data
        $data = [
            'name' => $name,
            'email' => $email,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Upload image (using custom function)
        $uploadedImage = $this->uploadProfileImage($image, $user['image'] ?? null);
        if ($uploadedImage) {
            $data['image'] = $uploadedImage;
        }

        // Update DB and session
        $userModel->update($userId, $data);
        $updatedUser = $userModel->find($userId);
        session()->set('user', $updatedUser);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text" => "Your profile has been successfully updated.",
            "icon" => "success"
        ]);

        $this->addLog('Updated user profile', "User");

        return $this->response->setJSON(['success' => true]);
    }

    public function upload_image()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $Gallery_Model = new Gallery_Model();

        $caption = $this->request->getPost('caption');
        $image   = $this->request->getFile('image');

        $errors = [];

        // Validate image
        if (!$image || !$image->isValid()) {
            $errors['image'] = 'Please select a valid image.';
        } elseif (!in_array(strtolower($image->getExtension()), ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors['image'] = 'Only JPG, PNG, or GIF files are allowed.';
        } elseif ($image->getSize() > (2 * 1024 * 1024)) { // 2MB limit
            $errors['image'] = 'Image must not exceed 2MB.';
        }

        if (!empty($errors)) {
            return $this->response->setJSON([
                'success' => true,
                'errors'  => $errors
            ]);

            session()->setFlashdata("notification", [
                "title" => "Oops...",
                "text"  => $errors['image'],
                "icon"  => "error"
            ]);
        }

        $uploadedImage = $this->uploadImage($image, 'public/dist/landing/images/gallery/');

        if (!$uploadedImage) {
            session()->setFlashdata("notification", [
                "title" => "Error!",
                "text"  => "Image upload failed.",
                "icon"  => "error"
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Image upload failed.'
            ]);
        }

        $Gallery_Model->insert([
            'image'      => $uploadedImage,
            'caption'    => $caption,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text"  => "Image has been uploaded successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Uploaded a new image', "Gallery");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Image uploaded successfully.'
        ]);
    }

    public function update_image()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $Gallery_Model = new Gallery_Model();

        $id       = $this->request->getPost('id');
        $oldImage = $this->request->getPost('old_image'); // e.g. "2.jpg"
        $caption  = $this->request->getPost('caption');
        $image    = $this->request->getFile('image');

        $errors = [];

        // Validate caption
        if (empty($caption)) {
            $errors['caption'] = 'Caption is required.';
        }

        // Validate image only if a new one is uploaded
        if ($image && $image->isValid()) {
            if (!in_array(strtolower($image->getExtension()), ['jpg', 'jpeg', 'png', 'gif'])) {
                $errors['image'] = 'Only JPG, PNG, or GIF files are allowed.';
            } elseif ($image->getSize() > (2 * 1024 * 1024)) { // 2MB
                $errors['image'] = 'Image must not exceed 2MB.';
            }
        }

        if (!empty($errors)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $errors
            ]);
        }

        $updateData = [
            'caption'    => $caption,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // If a new image was uploaded, handle replacement
        if ($image && $image->isValid()) {
            $uploadedImage = $this->uploadImage($image, 'public/dist/landing/images/gallery/');

            if (!$uploadedImage) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Image upload failed.'
                ]);
            }

            // Delete old image if it exists
            $oldPath = FCPATH . 'public/dist/landing/images/gallery/' . $oldImage;
            if (is_file($oldPath)) {
                unlink($oldPath);
            }

            $updateData['image'] = $uploadedImage;
        }

        // Update database
        $Gallery_Model->update($id, $updateData);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text"  => "Image has been updated successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Updated an image', "Gallery");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Image updated successfully.'
        ]);
    }

    public function delete_image()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $Gallery_Model = new Gallery_Model();
        $id = $this->request->getPost('id');

        // Fetch record
        $imageData = $Gallery_Model->find($id);

        if (!$imageData) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Image not found.'
            ]);
        }

        // Delete image file
        $imagePath = FCPATH . 'public/dist/landing/images/gallery/' . $imageData['image'];
        if (is_file($imagePath)) {
            unlink($imagePath);
        }

        // Delete from DB
        $Gallery_Model->delete($id);

        session()->setFlashdata("notification", [
            "title" => "Deleted!",
            "text"  => "Image has been deleted successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Deleted an image', "Gallery");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Image deleted successfully.'
        ]);
    }

    public function delete_message()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $Message_Model = new Message_Model();
        $id = $this->request->getPost('id');

        // Fetch record
        $messages = $Message_Model->find($id);

        if (!$messages) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Message not found.'
            ]);
        }

        // Delete from DB
        $Message_Model->delete($id);

        session()->setFlashdata("notification", [
            "title" => "Deleted!",
            "text"  => "Message has been deleted successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Deleted a message', "Message");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Message deleted successfully.'
        ]);
    }

    public function reply_message()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $name    = $this->request->getPost('name');
        $email   = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        // Subject & HTML body
        $subject = "Reply from I❤️Oras Support";

        $body = '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>' . htmlspecialchars($subject) . '</title>
            </head>
            <body style="font-family: Arial, sans-serif; background-color:#f4f4f4; margin:0; padding:20px; color:#333;">
                <table width="100%" cellpadding="0" cellspacing="0" style="max-width:600px; margin:auto; background:#ffffff; border:1px solid #ddd; border-radius:6px;">
                    <tr>
                        <td style="background:#333; padding:15px; text-align:center; color:#ffffff; font-size:18px; font-weight:bold; border-radius:6px 6px 0 0;">
                            I❤️Oras Support
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:25px; font-size:15px; line-height:1.6; color:#444;">
                            <p>Dear <strong>' . htmlspecialchars($name) . '</strong>,</p>

                            <p>' . nl2br(htmlspecialchars($message)) . '</p>

                            <p style="margin-top:25px;">Sincerely,<br>
                            <strong>I❤️Oras Support Team</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#f9f9f9; padding:15px; text-align:center; font-size:12px; color:#666; border-radius:0 0 6px 6px;">
                            This is a response from our support team.<br>
                            &copy; ' . date("Y") . ' I❤️Oras. All rights reserved.
                        </td>
                    </tr>
                </table>
            </body>
            </html>
        ';

        // Send email
        $sent = $this->send_email($email, $name, $subject, $body);

        if ($sent) {
            session()->setFlashdata("notification", [
                "title" => "Replied!",
                "text"  => "Your reply has been sent successfully to {$name}.",
                "icon"  => "success"
            ]);
        } else {
            session()->setFlashdata("notification", [
                "title" => "Error!",
                "text"  => "Failed to send reply to {$name}. Please try again.",
                "icon"  => "error"
            ]);
        }

        $this->addLog('Replied to a message', "Message");

        return $this->response->setJSON([
            'success' => $sent,
            'message' => $sent ? 'Reply sent successfully.' : 'Failed to send reply.'
        ]);
    }

    public function add_event()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $title = $this->request->getPost('title');
        $event_type = $this->request->getPost('event_type');
        $performers = $this->request->getPost('performers');
        $date = $this->request->getPost('date');
        $venue = $this->request->getPost('venue');
        $start_time = $this->request->getPost('start_time');
        $end_time = $this->request->getPost('end_time');
        $status = $this->request->getPost('status');
        $thumbnail   = $this->request->getFile('thumbnail');

        // Validate image
        if (!$thumbnail || !$thumbnail->isValid()) {
            $errors['image'] = 'Please select a valid image.';
        } elseif (!in_array(strtolower($thumbnail->getExtension()), ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors['image'] = 'Only JPG, PNG, or GIF files are allowed.';
        } elseif ($thumbnail->getSize() > (2 * 1024 * 1024)) { // 2MB limit
            $errors['image'] = 'Image must not exceed 2MB.';
        }

        if (!empty($errors)) {
            return $this->response->setJSON([
                'success' => true,
                'errors'  => $errors
            ]);

            session()->setFlashdata("notification", [
                "title" => "Oops...",
                "text"  => $errors['image'],
                "icon"  => "error"
            ]);
        }

        $uploadedImage = $this->uploadImage($thumbnail, 'public/dist/landing/images/events/');

        if (!$uploadedImage) {
            session()->setFlashdata("notification", [
                "title" => "Error!",
                "text"  => "Image upload failed.",
                "icon"  => "error"
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Image upload failed.'
            ]);
        }

        $Event_Model = new Event_Model();

        $Event_Model->insert([
            'thumbnail'     => $uploadedImage,
            'title'         => $title,
            'performers'    => $performers,
            'event_type'    => $event_type,
            'date'          => $date,
            'venue'         => $venue,
            'start_time'    => $start_time,
            'end_time'      => $end_time,
            'status'        => $status,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text"  => "Event has been added successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Added a new event', "Event");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Event added successfully.'
        ]);
    }

    public function delete_event()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $id = $this->request->getPost('id');
        $Event_Model = new Event_Model();

        // Fetch the event to get the thumbnail filename
        $event = $Event_Model->find($id);

        if (!$event) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Event not found.'
            ]);
        }

        // Delete the thumbnail image file if it exists
        if (!empty($event['thumbnail'])) {
            $imagePath = FCPATH . 'public/dist/landing/images/events/' . $event['thumbnail'];
            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($Event_Model->delete($id)) {
            session()->setFlashdata("notification", [
                "title" => "Success!",
                "text"  => "Event deleted successfully.",
                "icon"  => "success"
            ]);
        } else {
            session()->setFlashdata("notification", [
                "title" => "Oops...",
                "text"  => "Failed to delete event.",
                "icon"  => "error"
            ]);
        }

        $this->addLog('Deleted an event', "Event");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Event deleted successfully.'
        ]);
    }

    public function update_event()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $id = $this->request->getPost('id');
        $old_image = $this->request->getPost('old_image');
        $title = $this->request->getPost('title');
        $event_type = $this->request->getPost('event_type');
        $performers = $this->request->getPost('performers');
        $date = $this->request->getPost('date');
        $venue = $this->request->getPost('venue');
        $start_time = $this->request->getPost('start_time');
        $end_time = $this->request->getPost('end_time');
        $status = $this->request->getPost('status');
        $thumbnail   = $this->request->getFile('thumbnail');

        if ($thumbnail) {
            // Validate image
            if (!$thumbnail || !$thumbnail->isValid()) {
                $errors['image'] = 'Please select a valid image.';
            } elseif (!in_array(strtolower($thumbnail->getExtension()), ['jpg', 'jpeg', 'png', 'gif'])) {
                $errors['image'] = 'Only JPG, PNG, or GIF files are allowed.';
            } elseif ($thumbnail->getSize() > (2 * 1024 * 1024)) { // 2MB limit
                $errors['image'] = 'Image must not exceed 2MB.';
            }

            if (!empty($errors)) {
                return $this->response->setJSON([
                    'success' => true,
                    'errors'  => $errors
                ]);

                session()->setFlashdata("notification", [
                    "title" => "Oops...",
                    "text"  => $errors['image'],
                    "icon"  => "error"
                ]);
            }

            $uploadedImage = $this->uploadImage($thumbnail, 'public/dist/landing/images/events/');

            if (!$uploadedImage) {
                session()->setFlashdata("notification", [
                    "title" => "Error!",
                    "text"  => "Image upload failed.",
                    "icon"  => "error"
                ]);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Image upload failed.'
                ]);
            }
        } else {
            $uploadedImage = $old_image;
        }

        $Event_Model = new Event_Model();

        $Event_Model->update($id, [
            'thumbnail'     => $uploadedImage,
            'title'         => $title,
            'performers'    => $performers,
            'event_type'    => $event_type,
            'date'          => $date,
            'venue'         => $venue,
            'start_time'    => $start_time,
            'end_time'      => $end_time,
            'status'        => $status,
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text"  => "Event has been updated successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Updated an event', "Event");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Event updated successfully.'
        ]);
    }

    public function new_tourist_spot()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $name        = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $latitude    = $this->request->getPost('latitude');
        $longitude   = $this->request->getPost('longitude');

        $files = $this->request->getFiles();
        $errors = [];
        $uploadedImages = [];

        if (isset($files['photos'])) {
            foreach ($files['photos'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $ext = strtolower($file->getExtension());

                    if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                        $errors[] = "Invalid file type: {$file->getName()}";
                        continue;
                    }

                    if ($file->getSize() > (2 * 1024 * 1024)) { // 2MB
                        $errors[] = "File too large: {$file->getName()}";
                        continue;
                    }

                    // Use your uploadImage helper
                    $newName = $this->uploadImage($file, 'public/dist/landing/images/attractions/');

                    if ($newName) {
                        $uploadedImages[] = $newName;
                    } else {
                        $errors[] = "Failed to upload: {$file->getName()}";
                    }
                } else {
                    $errors[] = "Invalid file: {$file->getName()}";
                }
            }
        }

        if (!empty($errors)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $errors
            ]);
        }

        $Attraction_Model = new Attraction_Model();

        $Attraction_Model->insert([
            'name'        => $name,
            'description' => $description,
            'latitude'    => $latitude,
            'longitude'   => $longitude,
            'photo_gallery'      => json_encode($uploadedImages), // store as JSON array
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text"  => "Tourist Spot has been added successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Added a new tourist spot', "Tourist Spot");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Tourist Spot added successfully.'
        ]);
    }

    public function update_tourist_spot()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $id        = $this->request->getPost('id');
        $name        = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $latitude    = $this->request->getPost('latitude');
        $longitude   = $this->request->getPost('longitude');

        $Attraction_Model = new Attraction_Model();

        $Attraction_Model->update($id, [
            'name'        => $name,
            'description' => $description,
            'latitude'    => $latitude,
            'longitude'   => $longitude,
        ]);

        session()->setFlashdata("notification", [
            "title" => "Success!",
            "text"  => "Tourist Spot has been updated successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Updated a tourist spot', "Tourist Spot");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Tourist Spot updated successfully.'
        ]);
    }

    public function delete_tourist_spot()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $Attraction_Model = new Attraction_Model();
        $id = $this->request->getPost('id');

        // Fetch record
        $spot = $Attraction_Model->find($id);

        if (!$spot) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tourist spot not found.'
            ]);
        }

        // Unlink related images if they exist
        if (!empty($spot['photo_gallery'])) {
            $photos = json_decode($spot['photo_gallery'], true);

            if (is_array($photos)) {
                foreach ($photos as $fileName) {
                    $filePath = FCPATH . 'public/dist/landing/images/attractions/' . $fileName;
                    if (file_exists($filePath)) {
                        @unlink($filePath); // suppress errors
                    }
                }
            }
        }

        // Delete from DB
        $Attraction_Model->delete($id);

        session()->setFlashdata("notification", [
            "title" => "Deleted!",
            "text"  => "Tourist spot has been deleted successfully.",
            "icon"  => "success"
        ]);

        $this->addLog('Deleted a tourist spot', "Tourist Spot");

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Tourist spot deleted successfully.'
        ]);
    }
}
