<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use phpDocumentor\Reflection\Types\Boolean;

abstract class Controller
{
    public function vMain(string $page, array $data = []) {
        return $this->render($page, 'Main', $data);
    }

    public function vAdmin(string $page, array $data = []) {
        return $this->render($page, 'Admin', $data);
    }

    public function vUser(string $page, array $data = []) {
        return $this->render($page, 'User', $data);
    }

    public function vAuth(string $page, array $data = []) {
        return $this->render($page, 'Auth', $data);
    }

    private function render(string $page, string $type = "Main", array $data = []) {
        return Inertia::render('Modules/'.$type.'/index', [
            'page' => $page,
            'data' => $data
        ]);
    }

    public function jsonResponse(bool $success = false, string $message = '', $data = []) {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ]);
    }
}
