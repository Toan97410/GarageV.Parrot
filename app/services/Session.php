<?php

namespace App\Services;

class Session {

    public function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public function exists($key) {
        return isset($_SESSION[$key]);
    }

    public function remove($key) {
        if ($this->exists($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function regenerate() {
        session_regenerate_id(true);
    }

    public function destroy() {
        session_destroy();
    }

    public function logout() {
        $this->destroy();
        header('Location: /');
        exit();
    }
}