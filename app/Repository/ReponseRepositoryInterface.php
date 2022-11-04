<?php

namespace App\Repository;

interface ReponseRepositoryInterface
{
    public function sendResponse($data, $message = "success", $status = 200);
    public function sendError($errorData, $message, $status = 500);

}
