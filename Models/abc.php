<?php

class Abc {


    // function eka patangann vidiya
    // public function fetchAll(){
    //     try{

    //     }
    //     catch(PDOException $e){
    //         echo $e->getMessage();
    //         return null;
    //     }
    // }


    // select ekaka modal function eka
    public function getAllGigs($id){
        try{
            $sql = "SELECT * FROM gig WHERE farmerId = :abcid";
            $stmt =  Database::getBdd()->prepare($sql); //a widiytama
            $stmt->execute([
                'abcid' => $id,
            ]); //parmeters pass kranne mehema
            
            // ekak gannwanm $stmt->fetch
            // godak gannwanm $stmt->fetchAll
           $abcoutput = $stmt->fetchAll(PDO::FETCH_ASSOC); //a widiytama
           return $abcoutput;
        }
        catch(PDOException $e){
            //catch eka mehemm liynn one, wens krann epa
            echo $e->getMessage();
            return null;
        }
    }

    public function insertToTable($data){
        try{
            $sql = "INSERT INTO test(uname, pass) VALUES(:y, :pass)"; // insert q
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute([
                'y' => $data['x'],
                'pass' => $data['pass']
            ]);

            // $stmt->execute($data); // okkonm names tik $data object eke edan table column name ekata ankna ekama namanm dala tyenne, execute eka athule kelinma $data kiyl pass krann puluwan,

        }
        catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }


}