<?php

namespace App\database;

// Use desnecessário pois o PDO é uma classe que faz parte do núcleo do PHP
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
                    'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
                    DB_USER,
                    DB_PASSWORD
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

    //instanciamento da conexão.
    //$con = Connection::getInstancia();
}
