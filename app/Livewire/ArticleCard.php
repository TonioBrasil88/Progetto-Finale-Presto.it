<?php

namespace App\Livewire;

use Livewire\Component;

class ArticleCard extends Component
{
    public $article;
    public $image;
    public function render()
    {
        return view('livewire.article-card');
    }
}
