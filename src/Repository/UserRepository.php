<?php

namespace App\Repository;

use App\Contracts\BaseModel;
use App\Contracts\BaseRepository;
use App\database\Connection;
use App\Models\User;
use Exception;
use PDO;
use PDOException;

class UserRepository implements BaseRepository
{
    public static function find(int $id)
    {
        try {
            $db = Connection::getInstancia();
            $query = "SELECT * FROM user WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$userData) {
                return null;
            }
            $user = new user($userData['id'], $userData['name'], $userData['password']);
            $user->setName($userData['userName']);
            $user->setRole($userData['role']);
            return $user;
        } catch (PDOException $e) {
            throw new Exception("Erro ao recuperar usuário por ID: " . $e->getMessage());
        }
    }

    public static function getAll()
    {
        try {
            $db = Connection::getInstancia();
            $query = "SELECT * FROM user";
            $stmt = $db->query($query);
            $stmt->execute();
            $users = array();
            while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new user($userData['id'], $userData['name'], $userData['password']);
                $user->setName($userData['userName']);
                $user->setRole($userData['role']);
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
            $query = "INSERT INTO user (name, userName, password, role) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$user->getName(), $user->getUserName(), $user->getPassword(), $user->getRole()]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar usuário: " . $e->getMessage());
        }
    }

    public static function update(int $id, BaseModel $user)
    {
        try {
            $db = Connection::getInstancia();
            $query = "UPDATE user SET name = ?, userName = ?, password = ?, role = ? WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute([$user->getName(), $user->getUserName(), $user->getPassword(), $user->getRole()]);
            if ($stmt->rowCount() > 0) {
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
            $query = "DELETE FROM user WHERE id = :id";
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
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :userName AND password = :password");
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($result !== false);
    }
}
