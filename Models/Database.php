<?php
namespace App\Models;

use \PDO;
use \PDOException;
use \PDOStatement;

class Database
{
    public static string $host;
    public static string $user;
    public static string $pass;
    public static string $dbName;
    private static ?PDO $connexion = NULL;
    private static false|PDOStatement $request;

    /**
     * Connexion à la base de données à l'aide de PDO
     * @return PDO|PDOException
     */
    public static function connect (): PDO|PDOException
    {
        try
        {
            // Condition pour savoir si PDO a déjà été instancié
            // Cela permet de ne pas refaire de connexion à la base de donnée si elle a déjà été faite
            if (is_null(self::$connexion))
            {
                $host = self::$host;
                $dbName = self::$dbName;
                $user = self::$user;
                $pass = self::$pass;

                $path = "mysql:host=$host;dbname=$dbName;charset=utf8";
                $pdo = new PDO($path, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connexion = $pdo;
            }
            return self::$connexion;
        }
        catch (PDOException $e)
        {
            throw new PDOException($e->getMessage() , (int)$e->getCode());
        }
    }

    /**
     * Requête préparée
     * @param string $query La requête SQL
     * @param array $array Les paramètres SQL
     * @return bool|PDOStatement
     */
    public static function prepReq(string $query, array $array = []): bool|PDOStatement
    {
        self::$request = self::connect()->prepare($query);
        self::$request->execute($array);
        return self::$request;
    }

    /**
     * Récupère les données
     * @return bool|array
     */
    public static function fetchData(): bool|array
    {
        return self::$request->fetchAll(PDO::FETCH_ASSOC);
    }
}