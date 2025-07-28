<?php

namespace App\Controllers;

class Landing extends BaseController
{
    public function index()
    {
        session()->set('page', 'home');
        session()->set('page_title', 'Home');

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return view('landing/home');
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return view('landing/home');
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
    
    public function attractions()
    {
        session()->set('page', 'attractions');
        session()->set('page_title', 'Attractions');

        $header = view('landing/layouts/header');
        $body = view('landing/attractions');
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

        $header = view('landing/layouts/header');
        $body = view('landing/gallery');
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
}
