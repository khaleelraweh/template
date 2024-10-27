<?php

namespace App\Http\Livewire\Frontend\Blogs;

use App\Models\Post;
use App\Models\Tag;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BlogTagListComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginationLimit = 4;

    public $slug;


    public $searchQuery = '';
    public $selectedNames = [];

    protected $queryString = ['searchQuery'];

    public function resetFilters()
    {

        $this->searchQuery = '';
        $this->selectedNames = [];
    }


    public function render()
    {
        $slug = $this->slug;

        $tags = Tag::query()->whereStatus(1)->where('section', 3)->get();

        $posts = Post::with('photos');

        $posts = $posts->with('tags')->whereHas('tags', function ($query) use ($slug) {
            $query->where([
                'slug->' . app()->getLocale() => $slug,
                'status' => true
            ]);
        });

        // start adding new 

        $posts = $posts
            ->when($this->searchQuery, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('title', 'LIKE', '%' . $this->searchQuery . '%');
                });
            });



        $posts = $posts->active()
            ->paginate($this->paginationLimit);



        $total_Posts = Post::query()->Blog()->count();

        $recent_posts = Post::with('photos')->Blog()->orderBy('created_at', 'DESC')->take(3)->get();

        return view(
            'livewire.frontend.blogs.blog-tag-list-component',
            [
                'posts'             =>  $posts,
                'total_Posts'       =>  $total_Posts,
                'recent_posts'      =>  $recent_posts,
                'tags'              =>  $tags,
            ]
        );
    }
}
