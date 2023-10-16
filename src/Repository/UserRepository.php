<?php

namespace App\Repository;

use App\Contracts\BaseModel;
use App\Contracts\BaseRepository;
use App\Helpers\Session;
use App\Models\User;
use Database\Connection;
use Exception;
use PDO;
use PDOException;

class UserRepository implements BaseRepository
{
    public static function find(int $id)
    {
        try {
            $db = Connection::getInstancia();
            $query = "SELECT * FROM users WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$userData) {
                return null;
            }
            return $userData;
        } catch (PDOException $e) {
            throw new Exception("Erro ao recuperar usuário por ID: " . $e->getMessage());
        }
    }

    public static function getAll()
    {
        try {
            $db = Connection::getInstancia();
            $query = "SELECT * FROM users";
            $stmt = $db->query($query);
            $stmt->execute();
            $users = array();
            while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new user($userData['id'], $userData['name'], $userData['password']);
                $user->setName($userData['userName']);
                $users = $user;
            }
            return $users;
        } catch (PDOException $e) {
            throw new Exception("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }

    public static function create(BaseModel $user)
    {
        try {
            $db = Connection::getInstancia();
            $query = "INSERT INTO users (name, userName, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$user->getName(), $user->getUserName(), $user->getPassword()]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar usuário: " . $e->getMessage());
        }
    }

    public static function update(int $id, BaseModel $user)
    {
        try {
            $db = Connection::getInstancia();
            $query = "UPDATE users SET name = ?, userName = ? WHERE id = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$user->getName(), $user->getUserName(), $id]);
            if ($stmt->rowCount() > 0) {
                Session::set('userName', $user->getUserName());
                return true;
            }
            return false;
        } catch (PDOException $e) {
            throw new Exception("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }

    public static function delete(int $id)
    {
        try {
            $db = Connection::getInstancia();
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false; // Nenhum registro foi excluído (o usuário pode não existir)
        } catch (PDOException $e) {
            throw new Exception("Erro ao excluir usuário: " . $e->getMessage());
        }
    }

    public static function authenticateUser($userName, $password)
    {
        $db = Connection::getInstancia();
        $stmt = $db->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$userName, md5($password)]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
}
