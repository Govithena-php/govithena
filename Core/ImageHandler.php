<?php

class ImageHandler extends Image
{
    private $folder;

    public function __construct($folder)
    {
        $this->folder = $folder;
    }


    public function upload($name)
    {
        if (isset($_FILES[$name])) {
            $images = [];
            if (is_array($_FILES[$name]['name'])) {
                foreach ($_FILES[$name]['name'] as $key => $value) {
                    $image = new Image($_FILES[$name]['name'][$key], $_FILES[$name]['type'][$key],  $_FILES[$name]['size'][$key], $_FILES[$name]['tmp_name'][$key], $_FILES[$name]['error'][$key]);
                    $res = $image->upload($this->folder);

                    if ($res) {
                        $images[$key] = $res;
                    } else {
                        throw new Exception('Image Handler Exception: Unable to upload image[' . $key . "]");
                    }
                }
            } else {
                $image = new Image($_FILES[$name]['name'], $_FILES[$name]['type'],  $_FILES[$name]['size'], $_FILES[$name]['tmp_name'], $_FILES[$name]['error']);
                $res = $image->upload($this->folder);
                if ($res) {
                    $images[0] = $res;
                } else {
                    throw new Exception('Image Handler Exception: Unable to upload image');
                }
            }
            return $images;
        }
        die("error");
    }
}
