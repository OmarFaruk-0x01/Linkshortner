<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LinkAlreadyExistsException extends Exception
{
    public function render(Request $request): Response
    {

        $status = 400;
        $error = "Link already created";

        return response(["message" => $error, "status" => "failed"], $status);

    }
}
