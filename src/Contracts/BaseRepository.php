<?php

namespace App\Contracts;

interface BaseRepository
{
    public static function find(int $id);

    public static function getAll();

    public static function create(BaseModel $model);

    public static function update(int $id, BaseModel $model);

    public static function delete(int $id);
}
