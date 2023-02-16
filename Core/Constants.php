<?php
class PREFIX
{
    const GENERAL = '';
    const USER = 'USR';
    const GIG = 'GIG';
    const PRODUCT = 'PRO';
    const REQUEST = 'REQ';
    const RATING = 'RAT';
    const REVIEW = 'REV';
}

class PRODUCT
{
    const VEGETABLE = 'VEGETABLE';
    const FRUIT = 'FRUIT';
    const GRAIN = 'GRAIN';
    const SPICE = 'SPICE';
}

class ACTOR
{
    const ADMIN = "ADMIN";
    const INVESTOR = "INVESTOR";
    const FARMER = "FARMER";
    const AGROLOGIST = "AGROLOGIST";
    const TECH_ASSISTANT = "TECHASSISTANT";

    public static function get($key)
    {
        return constant("ACTOR::$key");
    }
}

class STATUS
{
    const PENDING = "PENDING";
    const ACTIVE = "ACTIVE";
    const DELETED = "DELETED";
    const COMPLETED = "COMPLETED";
    const ACCEPTED = "ACCEPTED";
    const REJECTED = "REJECTED";
}

class RATE
{
    const GIG = 'gig';
    const FARMER = 'farmer';
    const AGROLOGIST = 'agrologist';
    const TECH_ASSISTANT = 'techassistant';
}

class STAR
{
    const ONE = 1;
    const TWO = 2;
    const THREE = 3;
    const FOUR = 4;
    const FIVE = 5;
}



// define("GIG_REQUEST"; 'greq');
// define("AGROLOGIST_REQUEST", 'areq');
// define("TECH_ASSISTANT_REQUEST", 'treq');

// define("GIGOFFER", 'goff');
// define("AGROLOGIST_OFFER", 'aoff');
// define("TECH_ASSISTANT_OFFER", 'toff');


// define("PENDING", 'pend');
// define("ACTIVE", 'acti');
// define("DELETED", 'dele');
// define("COMPLETED", 'comp');
// define("ACCEPTED", 'acce');
