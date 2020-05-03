<?php

namespace App\src\controller;

use App\Config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function addComment(Parameter $post, $articleId)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $this->commentDAO->addComment($post, $articleId);
                $this->session->set('add_comment', '<span class="notif">Commentaire ajouté</span>');
                header('Location: ../public/index.php');
            }
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function test($testID)
    {
        header('Location: ../public/index.php');
    }
    public function flagComment($commentId)
    {
        $this->commentDAO->flagComment($commentId);
        header('Location: ../public/index.php');
    }

    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($checkPseu = $this->userDAO->checkUser($post->get('pseudo'))) {
                $errors['pseudo'] = $checkPseu;
            }
            if(!$errors) {
                $this->userDAO->register($post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT));
                $this->session->set('register', '<span class="notif">Votre compte a été crée</span');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit'))
        {
            $hash = $this->userDAO->checkPassword($post->get('pseudo'));
            if($hash === false)
            {
                $this->session->set('error_login', '<p class="red">Le pseudo est incorrect</p>');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
            if(password_verify($post->get('password'), ['password']))
            {
                $result = $this->userDAO->login($post->get('pseudo'));
                if($result) {
                    $this->session->set('login', '<span class="notif">Vous êtes connecté</span>');
                    $this->session->set('id', $result['result']['id']);
                    $this->session->set('role', $result['result']['name']);
                    $this->session->set('pseudo', $post->get('pseudo'));
                    header('Location: ../public/index.php');
                }
            }
            else {
                $this->session->set('error_login', '<p class="red">Le mot de passe est incorrect</p>');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}