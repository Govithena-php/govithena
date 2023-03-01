<?php

class Progress extends Model
{

    public function a()
    {
        try {
            $sql = "";
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
