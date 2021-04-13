<?php

namespace App\Controller;

use App\Entity\Currency;
use App\Form\CurrencyType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CurrencyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CurrencyController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/currency", name="currency")
     */
    public function index(
        Request $request,
        CurrencyRepository $currencyRepo, 
        EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CurrencyType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $from = $data['from'];
            $to = $data['to'];
            $amount = $data['amount'];
            $date = $data['date'];
            $dateString = $date->format('Y-m-d');

            $currency = $currencyRepo->findCurrencyInDDBB($from, $to, $amount, $date, $em);

            if (!$currency) {
                $response = $this->callExternalAPI($from, $to, $amount, $dateString);
                $exchange = $response['result'];

                $currency = new Currency();
                $currency->setCurrencySend($from);
                $currency->setCurrencyReceive($to);
                $currency->setAmount($amount);
                $currency->setDate($date);
                $currency->setExchange($exchange);

                $em->persist($currency);
                $em->flush();

                $this->addFlash("success", "Your exchange is $exchange $to!");

                return $this->render('currency/index.html.twig', [
                    'currencyForm' => $form->createView(),
                ]);
                
            } else {
                $exchange = $currency[0]->getExchange();

                $this->addFlash("success", "Your exchange is $exchange $to!");

                return $this->render('currency/index.html.twig', [
                    'currencyForm' => $form->createView(),
                ]);
            }

            return $this->render('currency/index.html.twig', [
                'currencyForm' => $form->createView(),
            ]);
        }

        return $this->render('currency/index.html.twig', [
            'currencyForm' => $form->createView(),
        ]);
    }

    private function callExternalAPI($from, $to, $amount, $dateString)
    {
        $request = $this->client->request(
            'GET',
            "http://data.fixer.io/api/convert?access_key=6a68d9bd0d5568598e2a163a0c040a7e&from=$from&to=$to&amount=$amount&date=$dateString"
        );

        $response = $request->toArray();

        return $response;
    }

    private function returnCurrencyExchange($form, $exchange, $to)
    {
        $this->addFlash("success", "Your exchange is $exchange $to!");

        return $this->render('currency/index.html.twig', [
            'currencyForm' => $form->createView(),
        ]);
    }
}
