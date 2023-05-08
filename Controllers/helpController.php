<?php

class helpController extends Controller
{
    private $helpModel;

    public function __construct()
    {
        $this->helpModel = $this->model('help');
    }


    public function index()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = new Input(POST, 'question');

            $questionId = new UID(PREFIX::QUESTION);

            $data = [
                'questionId' => $questionId,
                'question' => $question,
                'userId' => Session::get('user')->getUid(),
                'userEmail' => Session::get('user')->getUserName()

            ];
            if (!Session::get('user')->isLoggedIn()) {
                $data['userId'] = 'UNREGISTERED';
                $data['userEmail'] = new Input(POST, 'email');
            }

            $response = $this->helpModel->askQuestion($data);

            if ($response['success']) {
                if ($response['data']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully sent question. we will get back to you soon');
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Error sending question. Please try again later');
                }
                Session::set(['ask_question_alert' => $alert]);
            } else {
                $this->redirect('/error/somethingWentWrong');
            }
        }
        $this->render('index');
    }
}
