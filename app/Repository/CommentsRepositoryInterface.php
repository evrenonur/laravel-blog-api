<?php

namespace App\Repository;

interface CommentsRepositoryInterface
{
    public function getComments($id);
    public function createComment($data);
    public function updateComment($id, $data);
    public function deleteComment($id);
}
