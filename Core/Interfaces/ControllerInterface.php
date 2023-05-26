<?php

namespace App\Core\Interfaces;

use App\Core\Request;

interface ControllerInterface 
{
    public function get(Request $request);
    public function post(Request $request);
    public function put(Request $request);
    public function delete(int $id);
}