<?php

namespace App\Repository;

interface QuestionsRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function show($id);
    public function answers($id);
    public function createAnswer(array $data);

}
