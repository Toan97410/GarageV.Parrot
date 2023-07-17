<?php

namespace App\Middleware;

use App\Services\Session as ServicesSession;

class SessionMiddleware {
    private $session;

    public function __construct() {
        $this->session = new ServicesSession();
        $this->session->start();
    }

    public function getSession() {
        return $this->session;
    }
}