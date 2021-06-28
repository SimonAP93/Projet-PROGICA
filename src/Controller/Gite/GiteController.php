<?php

namespace App\Controller\Gite;

use App\Entity\Gite;

use App\Entity\Search;
use App\Entity\Contact;
use App\Form\SearchType;
use App\Form\ContactType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Notification\ContactNotification;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Container5409Exm\PaginatorInterface_82dac15;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $gites = $this->repo->findLatestGite();
        return $this->render('home/index.html.twig', [
            'gites' => $gites
        ]);
    }

    private GiteRepository $repo;
    private EntityManagerInterface $em;

    public function __construct(GiteRepository $repo,  EntityManagerInterface $em)
    {
        $this->repo = $repo ;
        $this->em = $em;
    }

    /**
     * @Route("/Browse", name="browse_index")
     */
    public function gites(Request $request, PaginatorInterface $paginator)
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);


        $data = $this->repo->findAllSearch($search);


        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('browse/index.html.twig', [
            'gites' => $gites,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/Browse/{id}", name="browse_show")
     */
    public function show(Gite $gite, Request $request, ContactNotification $notification)
    {
        $contact = new Contact();
        $contact->setGite($gite);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            
            $this->addFlash("success" , "Your request is sent successfuly");
            return $this->redirectToRoute('browse_show',[
                'id' =>$gite->getId(),
            ]);
        }

        return $this->render('browse/show.html.twig', [
            'gite' => $gite,
            'form' => $form->createView()
        ]);
    }



}
