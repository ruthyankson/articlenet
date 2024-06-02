<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'body', 'writer', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    /**
     * @param false|string $slug
     *
     * @return array|null
     */
    public function getArticles($slug = false)
    {
        if ($slug === false) {
            // Fetch articles in descending order
            return $this->orderBy('updated_at', 'DESC')->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}