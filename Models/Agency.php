<?php

namespace App\Models;

class Agency
    {

       /**
         * Permet de récupérer UNE agence via son ID
         * @param int $id 
         */
        public static function getAgency(int $agency_id)
        {
            $params = [
                'id' => $agency_id,
            ];
            Database::connect();
            $data = Database::prepReq(
                'SELECT FROM agency WHERE user.id = :id',
            );
            return $data->rowCount();
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
            Database::connect();
            $data = Database::prepReq(
                'SELECT * FROM agency INNER JOIN planet ON agency.id_planet = planet.id WHERE planet.id = :planet_id',
            );
            return $data->rowCount();
        }
              

        /**
         * Permet de récupérer toutes les agences
         * @param int $id
         */
        public static function getAllAgency()
        {
            Database::connect();
            $data = Database::prepReq(
                'SELECT * FROM agency');

            return $data->rowCount();
        }




        /**
         * Permet de supprimer une agence
         * @param int $id
         */
        public static function deleteAgency(int $agency_id)
        {
            $params = [
                'id' => $agency_id,
            ];
            Database::connect();
            $data = Database::prepReq(
                'DELETE FROM agency WHERE agency.id = :id',
            );
            return $data->rowCount();
        }

        /**
         * Permet de créer une agence
         * @param int $id
         */
        public static function postAgency($name, $email, $pwd, $ceo_name, $tel, $website, $logo, $id_planet)
        {
            $params = [
                "name" => $name,
                "email" => $email, 
                "pwd" => $pwd, 
                "ceo_name" =>$ceo_name, 
                "tel" => $tel, 
                "website" => $website, 
                "logo" => $logo, 
                "id_planet" => $id_planet
            ];

            Database::connect();
            $data = Database::prepReq(
                'INSERT INTO agency (name, email, pwd, ceo_name, tel, website, logo, id_planet) VALUES (:name, :email, :password, :ceo_name, :tel, :website, :logo, :id_planet)'
            );

            return $data->rowCount();
        }


        /**
         * Permet de modifier TOUTES les informations d'une agence ciblée par son ID.
         * @param int $id cible l'agence a modifier
         */
        public static function putAgency($id, $name, $email, $pwd, $ceo_name, $tel, $website, $logo, $id_planet)
        {


            $params = [
                "id" => $id,
                "name" => $name,
                "email" => $email, 
                "pwd" => $pwd, 
                "ceo_name" =>$ceo_name, 
                "tel" => $tel, 
                "website" => $website, 
                "logo" => $logo, 
                "id_planet" => $id_planet
            ];

            Database::connect();
            $data = Database::prepReq(
                 
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
            );
            return $data->rowCount();
        }

        // TODO : Fonction d'update de l'agence sélective,
        // func_get_args : https://www.php.net/manual/en/function.func-get-args.php
        // Récupérer les valeurs des arguments de la fonction en tant qu'array


    }