<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\AddWatermark;

use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateArticle extends Component
{
    use WithFileUploads;

    public $article;
    
    public $title;
    public $price;
    public $description;
    public $category;

    public $images=[];
    public $temporary_images;

    public function rules(){
        return [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'images.*' => 'image',
            'temporary_images.*'=> 'image',
        ];
    }
    public function messages(){
        return [
            'title.required' => __('ui.titleCheck'),
            'price.required' => __('ui.priceCheck'),
            'description.required' => __('ui.descriptionCheck'),
            'category.required' => __('ui.categoryCheck'),
            'temporary_images.required'=>__('ui.t-imgCheck'),
            'temporary_images.*.image'=>__('ui.t-fileCheck'),
            'images.image'=>__('ui.imgCheck'),
        ];
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image',
            
        ])) {
            foreach($this->temporary_images as $image){
                $this->images[]=$image;
                
            }
        }

    }

    public function removeImage($key){

        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store(){

        $this->validate();

        $category = Category::find($this->category);
        
        $this->article = $category->articles()->create([ 

            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            

      
            
        ]) ;

        // $this->article = Category::find($this->category)->articles()->create($this->validate()); 

        
        
        if(count($this->images)){
           
            foreach($this->images as $image){
                // $this->article->images()->create(['path'=> $image->store('images', 'public')]);
                $newFileName = "articles/{$this->article->id}";
                $newImage=$this->article->images()->create(['path'=> $image->store($newFileName, 'public')]);
                
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                   
                ])->dispatch($newImage->id);
                    
                /* AddWatermark::dispatch($newImage->id); */
            };

             File::deleteDirectory(storage_path('/app/livewire-tmp'));
        };

        
        
        redirect()->route('homepage')->with('message', __('ui.createArticle'));
        $this->cleanForm();
    }

    public function cleanForm(){
        $this->title='';
        $this->price='';
        $this->description='';
        $this->category='';
        /* $this->image=''; */
        $this->images=[];
        $this->temporary_images=[];

    }

    public function render()
    {
        return view('livewire.create-article');
    }


}
