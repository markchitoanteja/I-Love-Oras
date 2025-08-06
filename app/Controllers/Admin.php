<?php

namespace App\Controllers;

use App\Models\User_Model;

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

        $header = view('admin/layouts/header');
        $body = view('admin/photo_gallery');
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

        $header = view('admin/layouts/header');
        $body = view('admin/communication');
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
}
