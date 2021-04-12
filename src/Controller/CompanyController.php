<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Form\FilterType;
use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/company")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/", name="company_index", methods={"GET", "POST"})
     */
    public function index(
        Request $request, 
        CompanyRepository $companyRepository,
        EntityManagerInterface $em, 
        PaginatorInterface $paginator): Response
    {
        
        $form = $this->createForm(FilterType::class);
        $form->handleRequest($request);

        $companyName = $form->get('name')->getData();
        $sector = $form->get('sectorCompany')->getData();

        if ($companyName && !$sector) {
            $new = $companyRepository->find($companyName);

            dump($new);

            return $this->redirectToRoute('company_index');
        } else if ($sector && !$companyName){
            dump('Sector');
        } else {
            dump('Both');
        }

        $companies = $companyRepository->findAll();

        $companiesAndSection = [];

        foreach ($companies as $company) {
            $companyObj = $this->companyObject($company);
            $companiesAndSection[] = $companyObj;
        }

        $response = $paginator->paginate($companiesAndSection,
            $request->query->getInt('page', 1), 10
        );

        $numberCompanies = count($response);
        
        return $this->render('company/index.html.twig', [
            'companies' => $response,
            'numberCompanies' => $numberCompanies,
            'filterForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="company_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('company_index');
        }

        return $this->render('company/new.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="company_show", methods={"GET"})
     */
    public function show(int $id, CompanyRepository $companyRepo): Response
    {
        $company = $companyRepo->find($id);

        $companyObj = $this->companyObject($company);

        return $this->render('company/show.html.twig', [
            'company' => $companyObj,
        ]);
    }

    private function companyObject($company)
    {
        $companyObj = [
            'id' => $company->getId(),
            'name' => $company->getName(),
            'phone' => $company->getPhone(),
            'email' => $company->getEmail(),
            'sector' => $company->getSectorCompany()->getName()
        ];

        return $companyObj;
    }

    /**
     * @Route("/{id}/edit", name="company_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Company $company): Response
    {
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company_index');
        }

        return $this->render('company/edit.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="company_delete", methods={"POST"})
     */
    public function delete(Request $request, Company $company): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($company);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_index');
    }
}
