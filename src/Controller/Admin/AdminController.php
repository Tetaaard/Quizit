<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\User;
use App\Repository\CategorieRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class AdminController extends AbstractDashboardController
{
    protected $questionRepository;
    protected $userRepository;
    protected $categorieRepository;
    protected $reponseRepository;

    public function __construct(
        QuestionRepository $questionRepository,
        UserRepository $userRepository,
        CategorieRepository $categorieRepository,
        ReponseRepository $reponseRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->userRepository = $userRepository;
        $this->categorieRepository = $categorieRepository;
        $this->reponseRepository = $reponseRepository;
    }
    /**
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig',[
            'countAllUser'=>$this->userRepository->countAllUser(),
            'countAllCategorie'=> $this->categorieRepository->countAllCategorie(),
            'userInfos'=>$this->userRepository->findAll()

        ]);
        // return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Enigma');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users','fas fa-users',User::class);
        yield MenuItem::linkToCrud('Category','fas fa-puzzle-piece',Categorie::class);
        yield MenuItem::linkToCrud('Question','fas fa-clipboard-list',Question::class);
        yield MenuItem::linkToCrud('Answers','fas fa-edit',Reponse::class);
        yield MenuItem::linkToCrud('Stat','fas fa-chart-line',Categorie::class);
       
    
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
    public function configureUserMenu(UserInterface $user): UserMenu 
    {
        return parent::configureUserMenu($user)
        ->setName($user->getUsername())
        // ->setAvatarUrl("https://mir-s3-cdn-cf.behance.net/project_modules/disp/02f0b893570193.5e697092c4790.gif")
        ->setGravatarEmail($user->getUsername())
        ->displayUserAvatar(true)
        ;
    }
}
