<?php

namespace App\Http\Controllers\ApiControllers;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    use ApiResponser;

    public function __construct() {
    }
}
