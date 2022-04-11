<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategorySearchRepository
{

    private $categories;

    public function __construct()
    {
        $this->categories = (new Category);
    }

    public function makeQuery(array $query)
    {
        $this->withDisabledCategories($query['withDisabled'] ?? false);
        $this->filterByTitle($query['title'] ?? '');
    }

    public function orderBy(array $order)
    {
        switch($order['sort_by']) {
            case 'name':
                break;
            case 'created':
                break;
        }
    }

    public function paginateSearch(int $limit = 20)
    {
        return $this->categories->paginate($limit);
    }

    private function withDisabledCategories($withDisabled)
    {
        $withDisabled = filter_var($withDisabled, FILTER_VALIDATE_BOOLEAN);

        if($withDisabled) {
            $this->categories->withDisabledCategories();
        }
    }

    private function filterByTitle(string $title)
    {
        if(!!$title && isset($title) && strlen($title) > 3) {
            $this->categories->where('category_title', $title);
        }
    }

}
