<?php

class Rating
{

    private $id;
    private $type;
    private $from;
    private $to;
    private $stars;
    private $comment;
    private $date;
    private $image = [];

    public function __construct($type)
    {
        $this->id = new UID(PREFIX::RATING);
        $this->type = $type;
        $this->date = date('Y-m-d H:i:s');
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setStars($stars)
    {
        $this->stars = $stars;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setComment($comment)
    {
        $comment = trim($comment);
        $comment = stripslashes($comment);
        $comment = htmlspecialchars($comment);
        $this->comment = $comment;
    }

    public function getAssocArray()
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'from' => $this->from,
            'to' => $this->to,
            'stars' => $this->stars,
            'comment' => $this->comment,
            'date' => $this->date,
            'image' => $this->image
        ];
    }

    public function __toString()
    {
        return $this->id . " " . $this->date . " " . $this->type;
    }
}
