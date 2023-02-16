<?php

namespace App\Controller;

use App\Entity\Tweets;
use App\Form\TweetsType;
use App\Repository\TweetsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tweets')]
class TweetsController extends AbstractController
{
    #[Route('/', name: 'app_tweets_index', methods: ['GET'])]
    public function index(TweetsRepository $tweetsRepository): Response
    {
        return $this->render('tweets/index.html.twig', [
            'tweets' => $tweetsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tweets_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TweetsRepository $tweetsRepository): Response
    {
        $tweet = new Tweets();
        $tweet->setUserId($this->getUser());
        $form = $this->createForm(TweetsType::class, $tweet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tweetsRepository->save($tweet, true);

            return $this->redirectToRoute('app_tweets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tweets/new.html.twig', [
            'tweet' => $tweet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tweets_show', methods: ['GET'])]
    public function show(Tweets $tweet): Response
    {
        return $this->render('tweets/show.html.twig', [
            'tweet' => $tweet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tweets_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tweets $tweet, TweetsRepository $tweetsRepository): Response
    {
        $form = $this->createForm(TweetsType::class, $tweet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tweetsRepository->save($tweet, true);

            return $this->redirectToRoute('app_tweets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tweets/edit.html.twig', [
            'tweet' => $tweet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tweets_delete', methods: ['POST'])]
    public function delete(Request $request, Tweets $tweet, TweetsRepository $tweetsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tweet->getId(), $request->request->get('_token'))) {
            $tweetsRepository->remove($tweet, true);
        }

        return $this->redirectToRoute('app_tweets_index', [], Response::HTTP_SEE_OTHER);
    }
}
