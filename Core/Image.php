<?php

class Image
{
    private $name;
    private $type;
    private $size;
    private $tmp_name;
    private $error;

    public function __construct($name, $type, $size, $tmp_name, $error)
    {
        $this->name = $name;
        $this->type = $type;
        $this->size = $size;
        $this->tmp_name = $tmp_name;
        $this->error = $error;
    }

    public function error()
    {
        return $this->error;
    }

    public function is_valid()
    {
        return $this->error == 0;
    }

    public function is_image()
    {
        return in_array($this->type, IMAGES::TYPES);
    }

    public function generate_image_name()
    {
        return uniqid("IMG-", true) . '.' . strtolower(pathinfo(basename($this->name), PATHINFO_EXTENSION));
    }

    public function upload($folder)
    {
        if ($this->is_valid() && $this->is_image()) {
            $newName = $this->generate_image_name();
            $destination = ROOT . 'webroot/' . $folder . '/' . $newName;

            if (move_uploaded_file($this->tmp_name, $destination)) {
                return $newName;
            } else {
                return false;
            }
        }
        return false;
    }
}
