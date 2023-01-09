<?php

namespace App\Models;

class Agency
{
    /**
     * Permet de récupérer UNE agence via son ID
     * @param int $id
     */
    public static function get(int $agency_id)
    {
        $params = [
            'id' => $agency_id,
        ];
        Database::prepReq('SELECT * FROM agency WHERE id = :id', $params);
        return Database::fetchData();
    }

    /**
     * Permet de récupérer UNE agence via son l'ID de sa planète
     * @param int $planet_id correspond a l'id de la planête sur laquelle se trouve l'agence recherchée
     */
    public static function getAgencyByPlanetId(int $planet_id)
    {
        $params = [
            'planet_id' => $planet_id,
        ];

        Database::prepReq(
            'SELECT * FROM agency INNER JOIN planet ON agency.id_planet = planet.id WHERE planet.id = :planet_id',
            $params
        );
        return Database::fetchData();
    }

    /**
     * Permet de récupérer toutes les agences
     * @param int $id
     */
    public static function getAllAgency()
    {
        Database::prepReq('SELECT * FROM agency');
        return Database::fetchData();
    }

    /**
     * Permet de supprimer une agence
     * @param int $id
     */
    public static function delete(int $agency_id)
    {
        $params = [
            'id' => $agency_id,
        ];

        Database::prepReq('DELETE FROM agency WHERE id = :id', $params);
    }

    /**
     * Permet de créer une agence
     * @param int $id
     */
    public static function add(
        string $name,
        string $email,
        string $pwd,
        string $ceo_name,
        int $tel,
        string $website,
        string $logo,
        int $id_planet
    ) {
        $params = [
            'name' => $name,
            'email' => $email,
            'pwd' => $pwd,
            'ceo_name' => $ceo_name,
            'tel' => $tel,
            'website' => $website,
            'logo' => $logo,
            'id_planet' => $id_planet,
        ];

        return Database::prepReq(
            'INSERT INTO agency (name, email, pwd, ceo_name, tel, website, logo, id_planet) VALUES (:name, :email, :pwd, :ceo_name, :tel, :website, :logo, :id_planet)',
            $params
        );
    }

    /**
     * Permet de modifier TOUTES les informations d'une agence ciblée par son ID.
     * @param int $id cible l'agence a modifier
     */
    public static function put(
        $id,
        $name,
        $email,
        $pwd,
        $ceo_name,
        $tel,
        $website,
        $logo,
        $id_planet
    ) {
        $params = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'pwd' => $pwd,
            'ceo_name' => $ceo_name,
            'tel' => $tel,
            'website' => $website,
            'logo' => $logo,
            'id_planet' => $id_planet,
        ];

        Database::prepReq(
            'UPDATE agency
                SET
                name = :name,
                email = :email,
                pwd = :pwd,
                ceo_name = :ceo_name,
                tel = :tel,
                website = :website,
                logo = :logo,
                id_planet = :id_planet
                WHERE id = :id ',
            $params
        );
    }

    // TODO : Fonction d'update de l'agence sélective,
    // func_get_args : https://www.php.net/manual/en/function.func-get-args.php
    // Récupérer les valeurs des arguments de la fonction en tant qu'array
}
