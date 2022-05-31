<?php

namespace App\Interfaces;

interface MainInterface
{
    public function getAll();
    public function storeOrUpdate($data, $id = null);
    public function delete($id);
}
