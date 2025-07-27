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

        if (session()->has('user')) {
            $user = session()->get('user');

            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                return view('landing/about_oras');
            } else {
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        return view('landing/about_oras');
    }

    public function my_bookings()
    {
        $session = session();

        if ($session->has('user')) {
            $user = $session->get('user');

            // Check if user_type is 'user'
            if (isset($user['user_type']) && $user['user_type'] === 'user') {
                // User is logged in and is a 'user'
                // You can load a user-specific view or redirect somewhere else
                return view('my_bookings');  // example user dashboard view
            } else {
                // User is logged in but NOT a 'user' (e.g., admin or other)
                // Redirect to admin or another appropriate place
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

        // No user data in session, load the public home page
        return view('my_bookings');
    }
}
