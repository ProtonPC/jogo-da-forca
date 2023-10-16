<?php

namespace App\Repository;

use App\Contracts\BaseModel;
use App\Contracts\BaseRepository;
use Database\Connection;
use PDO;

class WordRepository implements BaseRepository
{
    public static function find(int $id)
    {
        $query = "SELECT * FROM `words` WHERE id = ($id)";
        $con = Connection::getInstancia()->query($query);
        $result = $con->fetchAll();
        return $result;
    }

    public static function getAll()
    {
        $query = "SELECT * FROM `words`";
        $con = Connection::getInstancia()->query($query);
        $result = $con->fetchAll();
        return $result;
    }

    public static function create(BaseModel $word)
    {
        $query = "INSERT INTO words (`content`, `level`, `tip`) VALUES (?,?,?)";
        $con = Connection::getInstancia()->prepare($query);
        $con->execute([$word->getName(), $word->getLevel(), $word->getTip()]);
    }

    public static function validateWord(BaseModel $word)
    {
        $word = $word->getName();
        $query = 'SELECT DISTINCT(content) FROM words';
        $con = Connection::getInstancia()->prepare($query);
        $con->execute();
        $contents = $con->fetchAll(PDO::FETCH_COLUMN);
        $result = true;
        foreach ($contents as $content) {
            if ($content == $word) {
                $result = false;
            }
        }
        return $result;
    }
    public static function update(int $id, BaseModel $word)
    {
        $query = "UPDATE words 
                SET content = '{$word->getName()}', level = '{$word->getLevel()}', tip = '{$word->getTip()}'
                WHERE id = $id";
        $con = Connection::getInstancia()->prepare($query);
        $con->execute();
    }

    public static function delete(int $id)
    {
        $query = "DELETE FROM words WHERE `id` = ($id)";
        $con = Connection::getInstancia()->query($query);
        $con->execute();
    }

    public static function deleteAll()
    {
        $query = "DELETE FROM words";
        $con = Connection::getInstancia()->query($query);
        $con->execute();
    }
}
