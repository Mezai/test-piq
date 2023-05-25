<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntegrationApiController extends AbstractController
{

    protected $response;

    public function __construct(JsonResponse $response)
    {
        $this->response = $response;
    }


    #[Route('api/webhook/verifyuser', name: 'app_integration_verifyuser')]
    public function verifyuser(): JsonResponse
    {
         $this->response->setData([
            'userId' => 'TEST_X', 
            'success' => true, 
            'balance' => '10000', 
            'balanceCy' => 'EUR', 
            'country' => 'DEU',
            "state" => "Stockholm",
            "firstName" => "John",
            "lastName" => "Smith",
            "street" => "15 Shrimpton Close, Old Wives Lees, Canterbury, CT4 8BT",
            "userCat" => "PLAYER",
            "locale" => "en_US",
            'email' => 'hty@kik.bz',
            "city" => 'Test',
            "mobile" => '+46733123123',
            "sex" => 'UNKNOWN',
            "zip" => '321 123',
            'dob' => '1992-12-22',
            'attributes' => ['nationalIdentificationNumber' => '19930913-2398'],
            'threeDS2' => ['cardholderAccount' => ['acctInfo' => ['chAccDate' => '20210804']]]
            
            ]);
        $this->response->send();

    }



    #[Route('api/webhook/authorize', name: 'app_integration_authorize')]
    public function authorize(): JsonResponse
    {
        $this->response->setData(['merchantTxId' => "221", "authCode" => "63d125c284e036.02734999", "success" => true]);
        $this->response->send();
        
    }

    #[Route('api/webhook/transfer', name: 'app_integration_transfer')]
    public function transfer(): JsonResponse
    {

        $this->response->setData(['userId' => 'TEST_X', 'success' => true, "errCode" => '123', "errMsg" => 'Transfer failed']);
        $this->response->send();
        
    }

    #[Route('api/webhook/signin', name: 'app_integration_signin')]
    public function signin(): JsonResponse
    {

        $this->response->setData(['userId' => 'TEST_X', 'success' => true, "sessionId" => '123', 'balance' => '100', 'balanceCy' => 'SEK']);
        $this->response->send();
        
    }


    #[Route('api/webhook/cancel', name: 'app_integration_cancel')]
    public function cancel(): JsonResponse
    {

        $this->response->setData(['userId' => 'TEST_X', 'success' => true, "retry" => false, "errCode" => '123', "errMsg" => 'Cancel failed']);
        $this->response->send();
        
    }

    #[Route('/test', name: 'app_integration_test')]
    public function test() {
        return $this->render('pages/success.html.twig');
    }
}


