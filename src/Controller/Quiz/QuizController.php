<?php

namespace App\Controller\Quiz;


use App\Entity\Categorie;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Form\QuizType;
use App\Form\ReponseFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    /**
     * @Route("/quiz", name="quiz_quiz")
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $donnees = $repository->findBy(array(), array('id' => 'desc'));

        $categories= $paginator->paginate(
            $donnees, 
            $request->query->getInt('page', 1),
            6
        );
        $questions = $this->getDoctrine()->getRepository(Question::class);

        return $this->render('quiz/quiz/index.html.twig', [
            'controller_name' => 'QuizController',
            'categories'=>$categories,
            'questions'=>$questions
        ]);
    }
    /**
     * @Route("/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('quiz/quiz/home.html.twig',[
            'title'=> "Bienvenudos sur la homepage ! ",
        ]);
    }
      /**
     * @Route("/quiz-new", name="app_create")
     */
    public function create(Request $request): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(QuizType::class);
        
        $form->handleRequest($request);
        // $form = $this->createForm(ReponseFormType::class);
        
        // $form->add('Submit', SubmitType::class, [
        //     'attr' => ['class' => 'btn btn-warning']
        // ]);
        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($form);
            $manager->flush();

            return $this->redirectToRoute('quiz_quiz');
        }
        dump($request);
        return $this->render('quiz/quiz/create.html.twig',[
            'form'=> $form->createView(),
        ]);

        
    }
       /**
     * @Route("/win", name="quiz_win")
     */
    public function win(): Response
    {
        return $this->render('quiz/quiz/win.html.twig');
    }

     /**
     * @Route("/quiz-{id}", name="app_show")
     */
    public function show($id,Request $request): Response
    {
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($id);
        $questions = $this->getDoctrine()->getRepository(Question::class)->findBy(['categorie'=>$id],array('id' => 'ASC'));
        
        // $result = $request->get('resultat');

        dump($request);

        if($request->request->count() > 0 ) {
            return $this->redirectToRoute('quiz_win');
        }
        //    dd($questions);
        return $this->render('quiz/quiz/show.html.twig',[
            'questions'=> $questions,
            'categorie'=>$categorie,
            // 'reponses'=>$reponses
        ]);

    }

    /**
     * @Route("/quiz/{id}/{idQuestion}", name="app_shows")
     */
    public function shows($id,$idQuestion): Response
    {
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($id);
        $question = $this->getDoctrine()->getRepository(Question::class)->find($idQuestion);
        $reponses = $question->getReponses();
        
        // dump($question);
        return $this->render('quiz/quiz/show.html.twig',[
            'categorie'=>$categorie,
            'question'=> $question,
            'reponses'=>$reponses
        ]);

    }
}
