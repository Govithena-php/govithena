<?php

class ActiveUser
{
    private $uid;
    private $username;
    private $firstName;
    private $lastName;
    private $type;
    private $img;
    private $logeddIn = false;

    public function __construct($uid, $username, $firstName, $lastName, $type, $img, $logeddIn)
    {
        $this->uid = $uid;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->type = $type;
        $this->img = $img;
        $this->logeddIn = $logeddIn;

        Session::set(['user' => $this]);
    }

    public function hasAccess($currentUserType)
    {
        return Session::get('user')->getType() == $currentUserType;
    }

    public function isInvestor()
    {
        return $this->type == ACTOR::INVESTOR;
    }

    public function isFarmer()
    {
        return $this->type == ACTOR::FARMER;
    }

    public function isAgrologist()
    {
        return $this->type == ACTOR::AGROLOGIST;
    }

    public function isTechAssistant()
    {
        return $this->type == ACTOR::TECH;
    }

    public function isAdmin()
    {
        return $this->type == ACTOR::ADMIN;
    }

    // getters and setters
    public function getUid()
    {
        return $this->uid;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getImage()
    {
        return $this->img;
    }

    public function isLoggedIn()
    {
        return $this->logeddIn;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setImage($img)
    {
        $this->img = $img;
    }

    public function setLogeddIn($logeddIn)
    {
        $this->logeddIn = $logeddIn;
    }

    //toString
    public function __toString()
    {
        return "User [uid=" . $this->uid . ", username=" . $this->username . ", firstName=" . $this->firstName . ", lastName=" . $this->lastName . ", type=" . $this->type . ", logeddIn=" . $this->logeddIn . "]";
    }
}
