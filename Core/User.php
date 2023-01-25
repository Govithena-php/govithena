<?php

enum User: string
{
    case GUE = "GUEST";
    case ADM = "ADMIN";
    case INV = "INVESTOR";
    case FAR = "FARMER";
    case AGR = "AGROLOGIST";
    case TEC = "TECHNICALASSISTANT";
}

class User
{
    private $uid;
    private $username;
    private $firstName;
    private $lastName;
    private $type = User::GUE;
    private $active = false;

    public function __construct($uid, $username, $firstName, $lastName, $type)
    {
        $this->uid = $uid;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->type = $type;
    }

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

    public function isActive()
    {
        return $this->active;
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

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function __toString()
    {
        return "User [uid=" . $this->uid . ", username=" . $this->username . ", firstName=" . $this->firstName . ", lastName=" . $this->lastName . ", type=" . $this->type . ", active=" . $this->active . "]";
    }

    public function __destruct()
    {
        echo "User [uid=" . $this->uid . ", username=" . $this->username . ", firstName=" . $this->firstName . ", lastName=" . $this->lastName . ", type=" . $this->type . ", active=" . $this->active . "] destroyed";
    }
}
