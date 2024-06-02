<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController
{
    // App title
    public static $app_title = 'Article Repo';


    // Fetch all the articles from the database
    public function index()
    {
        $model = model(ArticleModel::class);

        $data = [
            'articles' => $model->getArticles(),
            'title'     => self::$app_title,
        ];

        return view('templates/header', $data)
            . view('articles/index')
            . view('articles/edit-modal', $data)
            . view('articles/delete-confirmation-modal', $data)
            . view('templates/footer');
    }


    // Fetch and display the details of a specified article on the details page
    public function detail(?string $slug = null)
    {
        $model = model(ArticleModel::class);

        $data['article'] = $model->getArticles($slug);

        if ($data['article'] === null) {
            throw new PageNotFoundException('Cannot find the article: ' . $slug);
        }

        $data['title'] = self::$app_title;

        return view('templates/header', $data)
            . view('articles/detail', $data)
            . view('articles/edit-modal', $data)
            . view('articles/delete-confirmation-modal', $data)
            . view('templates/footer');
    }


    // Store a newly created article in the database
    public function store()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'body', 'writer']);

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
            'writer' => 'required|max_length[255]|min_length[3]',
        ])) {
            // Validation fails, return errors as JSON for modal
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Gets the validated data.
        $post = $this->request->getPost();

        $model = new ArticleModel();

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
            'writer' => $post['writer'],
        ]);

        // Return success response
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Article created successfully'
        ]);
    }


    // Update the details of an existing article
    public function update($id)
    {
        helper('form');

        $data = $this->request->getPost(['title', 'body', 'writer']);

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
            'writer' => 'required|max_length[255]|min_length[3]',
        ])) {
            // Validation fails, return errors as JSON for modal
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Gets the validated data.
        $post = $this->request->getPost();

        $model = new ArticleModel();

        $model->update($id, [
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
            'writer' => $post['writer'],
        ]);

        // Return success response
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Article updated successfully'
        ]);
    }

    
    // Delete a specified article from the database
    public function delete($id)
    {
        $model = new ArticleModel();

        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Article deleted successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to delete article'
            ]);
        }
    }

}