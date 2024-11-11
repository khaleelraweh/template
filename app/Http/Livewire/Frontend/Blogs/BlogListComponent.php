<?php

namespace App\Http\Livewire\Frontend\Blogs;

use App\Models\Event;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BlogListComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginationLimit = 4;

    public $slug;

    public $searchQuery = '';

    protected $queryString = ['searchQuery'];

    public function resetFilters()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        // Determine the current route name
        $currentRoute = Route::currentRouteName();

        if ($currentRoute === 'frontend.blog_list' || $currentRoute === 'frontend.news_list') {
            $tags = Tag::query()->whereStatus(1)->where('section', 3)->get();
            $posts = Post::with('photos');

            $posts = $posts
                ->when($this->searchQuery, function ($query) {
                    $query->where(function ($subQuery) {
                        $subQuery->where('title', 'LIKE', '%' . $this->searchQuery . '%');
                    });
                })
                ->Blog()->active()->paginate($this->paginationLimit);


            $total_Posts = Post::query()->Blog()->count();

            $recent_posts = Post::with('photos')->Blog()->orderBy('created_at', 'DESC')->take(3)->get();
        } elseif ($currentRoute === 'frontend.events_list') {
            $tags = Tag::query()->whereStatus(1)->where('section', 3)->get();
            $posts = Event::with('photos');

            $posts = $posts
                ->when($this->searchQuery, function ($query) {
                    $query->where(function ($subQuery) {
                        $subQuery->where('title', 'LIKE', '%' . $this->searchQuery . '%');
                    });
                })
                ->active()->paginate($this->paginationLimit);


            $total_Posts = Event::query()->count();

            $recent_posts = Event::with('photos')->orderBy('created_at', 'DESC')->take(3)->get();
        } else {
            abort(404); // Handle unsupported routes
        }

        return view(
            'livewire.frontend.blogs.blog-list-component',
            [
                'posts'             =>  $posts,
                'total_Posts'       =>  $total_Posts,
                'recent_posts'      =>  $recent_posts,
                'tags'              =>  $tags,
            ]
        );
    }
}
