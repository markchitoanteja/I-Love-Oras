<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User_Model;
use App\Models\Gallery_Model;
use App\Models\Message_Model;

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

        $header = view('admin/layouts/header');
        $body = view('admin/dashboard');
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

        $header = view('admin/layouts/header');
        $body = view('admin/events');
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

        $header = view('admin/layouts/header');
        $body = view('admin/tourist_spots');
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

        return $this->response->setJSON([
            'success' => $sent,
            'message' => $sent ? 'Reply sent successfully.' : 'Failed to send reply.'
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
