@extends('layouts.app')

@section('style')
    <style>
        @media(min-width:900px) {
            .main-banner-blog .banner-content h1 {
                padding-top: 60px;
            }
        }

        .pagination-main .pagination li span,
        .pagination-main .pagination li button {
            font-family: "Open Sans", sans-serif;
            font-weight: 600;
            font-size: 14px;
            padding: 15px 24px;
            border: none;
            margin: 0 5px;
            color: #2f2933;
            display: inline-block;


        }

        .pagination-main .pagination li button {
            background: none;
        }

        .pagination-main .pagination li span:hover,
        .pagination-main .pagination li span:active,
        .pagination-main .pagination li button:hover {
            background-color: #f3bf2b;
            color: #ffffff !important;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            border-radius: 30px;
        }

        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            background-color: #f3bf2b;
            color: #ffffff !important;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            border-radius: 30px;
        }
    </style>
@endsection

@section('content')
    <!-- loader start -->
    <div class="bookshelf_wrapper">
        <ul class="books_list">
            <li class="book_item first"></li>
            <li class="book_item second"></li>
            <li class="book_item third"></li>
            <li class="book_item fourth"></li>
            <li class="book_item fifth"></li>
            <li class="book_item sixth"></li>
        </ul>
        <div class="shelf"></div>
    </div>
    <!-- loader end -->

    @livewire('frontend.blogs.blog-tag-list-component', ['slug' => $slug])
@endsection
