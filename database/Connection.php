<?php

namespace App\database;

use PDO;
use PDOException;

class Connection
{
    private static $instancia;
    public static function getInstancia()
    {
        if (empty(self::$instancia)) {
            try {
                self::$instancia = new PDO(
                    'mysql:host=' .
                    constants('DB_HOST') . ';port=' . constants('DB_PORT') . ';dbname=' . constants('DB_NAME'),
                    constants('DB_USER'),
                    constants('DB_PASSWORD')
                );
            } catch (PDOException $ex) {
                die("Erro na conexão: " . $ex->getMessage());
            }
            return self::$instancia;
        }
    }

    // Instrução para seguir o padrão de projeto singleton para existir apenas uma instancia da conexão
    // Criação do método construtor para não instanciamento
    protected function __construct()
    {
    }
    // Criação do método clone para impedir a clonagem da classe
    protected function clone(): void
    {
    }
}
