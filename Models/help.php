<?php

class Help
{
    public function askQuestion($data)
    {
        try {
            $sql = "INSERT INTO user_question (questionId, userId, userEmail, question) VALUES (:questionId, :userId, :userEmail, :question)";
            $stmt = Database::getbdd()->prepare($sql);
            $stmt->execute([
                'questionId' => $data['questionId'],
                'userId' => $data['userId'],
                'userEmail' => $data['userEmail'],
                'question' => $data['question']
            ]);
            return ['success' => true, 'data' => true];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
