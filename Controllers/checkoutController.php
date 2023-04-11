<?php

use function PHPSTORM_META\type;

class checkoutController extends Controller
{
    private $investorGigModel;
    private $investmentModel;
    private $requestFarmerModel;
    private $currentUser;
    private $gigModel;

    private $header = [
        'merchant_id' => '1221583',
        'return_url' => URLROOT . '/checkout/return/',
        'cancel_url' => URLROOT . '/checkout/',
        'notify_url' => URLROOT . '/checkout/notify/',
        'currency' => 'LKR',

    ];

    private $payhere_secret = 'MjU5NTkxMzU4OTQwODAxODI4MTYxMzE1NDg2NDYxMTk3Mzg1Mzk4OA==';

    public function __construct()
    {

        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
        $this->header['email'] = Session::get('username');

        $this->currentUser = Session::get('user');
        $this->investorGigModel = $this->model('investorGig');
        $this->investmentModel = $this->model('investment');
        $this->requestFarmerModel = $this->model('requestFarmer');
        $this->gigModel = $this->model('gig');
    }

    private function payhere($d)
    {
        $this->header['cancel_url'] .= $d['order_id'];

        $data = array_merge($this->header, $d);
        // $md5sig = strtoupper(md5($data['merchant_id'] . $data['order_id'] . $data['amount'] . "LKR" . strtoupper(md5($this->payhere_secret))));
        // $data['hash'] = 'DF25675446C0A320CBFE29D9F58189AA';


        // $sig1 = strtoupper(md5('1221583' + '30' + '2500' + 'LKR' + strtoupper(md5('MjU5NTkxMzU4OTQwODAxODI4MTYxMzE1NDg2NDYxMTk3Mzg1Mzk4OA=='))));
        // $temp = array('1221583', '30', '2500', 'LKR', strtoupper(md5('MjU5NTkxMzU4OTQwODAxODI4MTYxMzE1NDg2NDYxMTk3Mzg1Mzk4OA==')));
        // $str = implode('', $temp);
        // $sig2 = strtoupper(md5($str));
        // $data['hash'] = $sig2;
        // echo phpversion();
        if (isset($_POST['pay'])) {
            $id = $_POST['pay'];
            $res = $this->requestFarmerModel->getRequestById($id);

            if (isset($res)) {

                $data = [
                    'first_name' => 'achini',
                    'last_name' => 'c',
                    'email' => Session::get('username'),
                    'phone' => '0771234567',
                    'address' => 'No.1, Galle Road',
                    'city' => 'Colombo',
                    'order_id' => '30',
                    'items' => $res['title'],
                    'currency' => 'LKR',
                    'amount' => '2500',
                    'country' => 'Sri Lanka',
                ];
                $this->payhere($data);
            }
        }

        $sig = '1221583';
        $sig .= '30';
        $sig .= number_format('3212', 2, '.', '');
        $sig .= 'LKR';
        $sig .= strtoupper(md5($this->payhere_secret));
        $sig = strtoupper(md5($sig));
        $data['hash'] = $sig;

        // print_r($data);
        echo json_encode($data);

        $url = "https://sandbox.payhere.lk/pay/checkout";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/x-www-form-urlencoded', 'Connection: Keep-Alive'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function pay()
    {

        if (isset($_POST['pay'])) {
            $id = $_POST['pay'];
            $res = $this->requestFarmerModel->getRequestById($id);
            $investment = new $this->investmentModel();
            $response = $investment->add([
                'id' =>  new UID(PREFIX::INVESTMENT),
                'investorId' => $this->currentUser->getUid(),
                'gigId' => $res['gigId'],
                'amount' => $res['capital']
            ]);


            // if payment success

            // investor__gig ekta add wenn one ✔️
            // request eke paid accepted -> paid . ✔️
            // gig eke active -> reserved ✔️
            // investmet table ekeata gana add wenn one
            // recent activites walta add wenawa


            $response = $this->investorGigModel->add([
                'investorId' => $this->currentUser->getUid(),
                'gigId' => $res['gigId'],
                'farmerId' => $res['farmerId'],
            ]);

            $this->requestFarmerModel->updateStatus($id, 'PAID');

            $res = $this->gigModel->updateGigStatusToReserved($res['gigId']);


            $this->redirect('/dashboard');
        }
    }

    public function index($params)
    {
        list($id) = $params;
        $res = $this->requestFarmerModel->getRequestById($id);
        if (isset($res)) {
            $this->set(['res' => $res]);
            $payment = [
                "sandbox" => true,
                "merchant_id" => $this->header['merchant_id'],
                "return_url" => $this->header['return_url'],
                "cancel_url" => $this->header['cancel_url'],
                "notify_url" => $this->header['notify_url'],
                "order_id" => $res['requestId'],
                "items" => $res['title'],
                "amount" => $res['capital'],
                "currency" => $this->header['currency'],
                "first_name" => $res['firstName'],
                "last_name" => $res['lastName'],
                "email" => $this->header['email'],
                "phone" => "0412345678",
                "address" => "No.1, Galle Road",
                "city" => $res['city'],
                "country" => "Sri Lanka",
            ];
            $this->set(['payment' => $payment]);
        } else {
            $this->set(['error' => "no requests found"]);
        }
        $this->render('index');
    }



    public function return()
    {
        echo "return";
    }

    public function cancel()
    {
        $this->redirect('/checkout');
    }

    public function notify()
    {
        echo "notify";
    }
}
