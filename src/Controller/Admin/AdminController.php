<?php
namespace App\Controller\Admin;

use App\Entity\Gite;
use App\Form\GiteType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    private GiteRepository $repo;
    private EntityManagerInterface $em;

    public function __construct(GiteRepository $repo, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $repo;
    }


     /**
     * @Route("/admin", name="admin_index")
     */
    public function index(Request $request,PaginatorInterface $paginator)
    {
        $data = $this->repo->findAdmin();

        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            25
        );

        return $this->render('admin/index.html.twig', [
            'gites' => $gites
        ]);
        
    }

    /**
     * @Route("/admin/new", name="admin_new")
     */
    public function new(Request $request)
    {
        $gite = new Gite();
        $form = $this->createForm(GiteType::class,$gite);
            
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash("success" , "The gite is added successfully!");
            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/new.html.twig', [
            'form' => $form->createView()
        ]);
    
    }

     /**
     * @Route("/admin/edit/{id}", name="admin_edit")
     */
    public function edit(Gite $gite , Request $request)
    {
        $form = $this->createForm(GiteType::class,$gite);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash("success" , "The gite is edited successfully!");
            return $this->redirectToRoute('admin_index');
        }
        return $this->render('admin/edit.html.twig', [
            
            'form' => $form->createView()
            
        ]);
        

    }


     /**
     * @Route("/admin/gite/{id}", name="admin_remove")
     */
    public function remove(Gite $gite)
    {
        
            $this->em->remove($gite);
            $this->em->flush();
            $this->addFlash("success" , "The gite is removed successfully!");
            return $this->redirectToRoute('admin_index');
       

    }
}