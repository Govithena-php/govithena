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
    const INVESTMENT = 'INV';
    const PROGRESS = 'PRG';
    const CATEGORY = 'CAT';
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
    const TECH = "TECHASSISTANT";

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


class IMAGES
{
    const TYPES = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
}

define("DISTRICTS_ARRAY", array(
    "Ampara",
    "Anuradhapura",
    "Badulla",
    "Batticaloa",
    "Colombo",
    "Galle",
    "Gampaha",
    "Hambantota",
    "Jaffna",
    "Kalutara",
    "Kandy",
    "Kegalle",
    "Kilinochchi",
    "Kurunegala",
    "Mannar",
    "Matale",
    "Matara",
    "Monaragala",
    "Mullaitivu",
    "Nuwara Eliya",
    "Polonnaruwa",
    "Puttalam",
    "Ratnapura",
    "Trincomalee",
    "Vavuniya"
));

define("DISTRICTS", array(
    "AMPARA" => "Ampara",
    "ANURADHAPURA" => "Anuradhapura",
    "BADULLA" => "Badulla",
    "BATTICALOA" => "Batticaloa",
    "COLOMBO" => "Colombo",
    "GALLE" => "Galle",
    "GAMPAHA" => "Gampaha",
    "HAMBANTOTA" => "Hambantota",
    "JAFFNA" => "Jaffna",
    "KALUTARA" => "Kalutara",
    "KANDY" => "Kandy",
    "KEGALLE" => "Kegalle",
    "KILINOCHCHI" => "Kilinochchi",
    "KURUNEGALA" => "Kurunegala",
    "MANNAR" => "Mannar",
    "MATALE" => "Matale",
    "MATARA" => "Matara",
    "MONARAGALA" => "Monaragala",
    "MULLAITIVU" => "Mullaitivu",
    "NUWARA_ELIYA" => "Nuwara Eliya",
    "POLONNARUWA" => "Polonnaruwa",
    "PUTTALAM" => "Puttalam",
    "RATNAPURA" => "Ratnapura",
    "TRINCOMALEE" => "Trincomalee",
    "VAVUNIYA" => "Vavuniya"
));




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
