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

    public function fetchOtpByEmail($email)
    {
        try {
            $sql = "SELECT otpHash, createdAt FROM otp WHERE email = :email ORDER BY createdAt DESC LIMIT 1";
            $req = Database::getBdd()->prepare($sql);
            $req->execute(['email' => $email]);
            return ['status' => true, 'data' => $req->fetch(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
}
