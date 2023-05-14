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
    const FEILDVISIT = 'FVT';
    const INVESTOR_GIG = 'ING';
    const WITHDRAWAL = 'WTH';
    const QUESTION = 'QST';
    const PAYMENT = 'PMT';
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
    const PAID = "PAID";
}


class IMAGES
{
    const TYPES = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
}


class ALERT_TYPE
{
    const SUCCESS = "success";
    const INFO = "info";
    const WARNING = "warning";
    const ERROR = "error";
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
    "ampara" => "Ampara",
    "anuradhapura" => "Anuradhapura",
    "badulla" => "Badulla",
    "batticaloa" => "Batticaloa",
    "colombo" => "Colombo",
    "galle" => "Galle",
    "gampaha" => "Gampaha",
    "hambanthota" => "Hambantota",
    "jaffna" => "Jaffna",
    "kalutara" => "Kalutara",
    "kandy" => "Kandy",
    "kegalle" => "Kegalle",
    "kilinichchi" => "Kilinochchi",
    "kurunegala" => "Kurunegala",
    "mannar" => "Mannar",
    "matale" => "Matale",
    "matara" => "Matara",
    "monaragala" => "Monaragala",
    "mullaitivu" => "Mullaitivu",
    "nuwara eliya" => "Nuwara Eliya",
    "polonnaruwa" => "Polonnaruwa",
    "puttalam" => "Puttalam",
    "rathnapura" => "Ratnapura",
    "trincomalee" => "Trincomalee",
    "vavuniya" => "Vavuniya"
));


define(
    "BANK_ARRAY",
    array(
        "Amana Bank",
        "Axis Bank",
        "Bank of Ceylon",
        "Cargills Bank",
        "Central Finance Company PLC",
        "Citibank",
        "Commercial Bank of Ceylon",
        "DFCC Bank",
        "Deutsche Bank",
        "Habib Bank",
        "Hatton National Bank",
        "HDFC Bank",
        "HSBC",
        "ICICI Bank",
        "Indian Bank",
        "Indian Overseas Bank",
        "MBSL Savings Bank",
        "Merchant Bank of Sri Lanka",
        "Nations Trust Bank",
        "National Development Bank PLC",
        "Pan Asia Banking Corporation",
        "People's Bank",
        "Public Bank",
        "Sampath Bank",
        "Seylan Bank",
        "Standard Chartered Bank",
        "State Bank of India",
        "Union Bank of Colombo PLC"
    )
);

define(
    "BANK",
    array(
        "AMANA_BANK" => "Amana Bank",
        "AXIS_BANK" => "Axis Bank",
        "BANK_OF_CEYLON" => "Bank of Ceylon",
        "CARGILLS_BANK" => "Cargills Bank",
        "CENTRAL_FINANCE_COMPANY_PLC" => "Central Finance Company PLC",
        "CITIBANK" => "Citibank",
        "COMMERCIAL_BANK_OF_CEYLON" => "Commercial Bank of Ceylon",
        "DFCC_BANK" => "DFCC Bank",
        "DEUTSCHE_BANK" => "Deutsche Bank",
        "HABIB_BANK" => "Habib Bank",
        "HATTON_NATIONAL_BANK" => "Hatton National Bank",
        "HDFC_BANK" => "HDFC Bank",
        "HSBC" => "HSBC",
        "ICICI_BANK" => "ICICI Bank",
        "INDIAN_BANK" => "Indian Bank",
        "INDIAN_OVERSEAS_BANK" => "Indian Overseas Bank",
        "MBSL_SAVINGS_BANK" => "MBSL Savings Bank",
        "MERCHANT_BANK_OF_SRI_LANKA" => "Merchant Bank of Sri Lanka",
        "NATIONS_TRUST_BANK" => "Nations Trust Bank",
        "NATIONAL_DEVELOPMENT_BANK_PLC" => "National Development Bank PLC",
        "PAN_ASIA_BANKING_CORPORATION" => "Pan Asia Banking Corporation",
        "PEOPLE'S_BANK" => "People's Bank",
        "PUBLIC_BANK" => "Public Bank",
        "SAMPATH_BANK" => "Sampath Bank",
        "SEYLAN_BANK" => "Seylan Bank",
        "STANDARD_CHARTERED_BANK" => "Standard Chartered Bank",
        "STATE_BANK_OF_INDIA" => "State Bank of India",
        "UNION_BANK_OF_COLOMBO_PLC" => "Union Bank of Colombo PLC"
    )
);




define('CONVENSION_FEES', 1000);





// SMTPACCOUNT, SMTPPASSWORD, SMTPNAME

define('SMTPACCOUNT', 'govithena.lk@gmail.com');
define('SMTPPASSWORD', 'yxkyiewhrqotyyyf');
define('SMTPNAME', 'Govithena LK');

define('DEFAULT_PROFILE_PICTURE', 'onerror="this.src= `' . UPLOADS . '/profilePictures/default.jpg`"');

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
