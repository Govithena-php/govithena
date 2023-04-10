<?php

class otp
{
    public function saveOtp($email, $otpHash)
    {
        try {
            $sql = "INSERT INTO otp (email, otpHash) VALUES (:email, :otpHash)";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['email' => $email, 'otpHash' => $otpHash]);
            return ['status' => true];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
}
