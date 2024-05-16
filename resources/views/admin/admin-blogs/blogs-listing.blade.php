@extends('admin.layouts.main')

@section('title')
    {{ Str::upper(Str::headline(Request::segment(2))) }}
@endsection

@section('styles')
    <!-- BEGIN: Page CSS-->
    <style>
        div.dataTables_paginate span {
            display: none;
        }

        @media screen and (max-width: 767px) {
            li.paginate_button.previous {
                display: inline;
            }

            li.paginate_button.next {
                display: inline;
            }

            li.paginate_button {
                display: none;
            }
        }

        .form-select-sm,
        .form-control-sm {
            font-size: 1rem;
            padding: 0.571rem 1rem 0.571rem 1rem;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">

    <!-- END: Page CSS-->
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-12 mb-2">
                    <div class="row breadcrumbs-top">

                        {{-- <div class="col-8">
                            <h2 class="float-start mb-0">Blood Donors</h2>

                        </div> --}}
                        {{-- <div class="col-4 text-end">
                            <a class="dt-button btn btn-primary btn-add-record ms-2 " tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" href='{{ route('donors.create') }}'>

                                <span>Add Donor</span>
                            </a>
                        </div> --}}
                    </div>
                </div>

            </div>
            <div class="content-body">

                {{-- {{ Auth::user()->id }} --}}

                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Blogs Category</h2>
                                    <a href="{{ route('admin-blogs.create') }}" class="btn btn-primary">Add
                                        Blog</a>
                                </div>
                                <div class="card-body">

                                    {{-- <div id="table_data">
                                        @include('admin.popular-cities.popular-cities-list-pagination')
                                    </div> --}}

                                    <!-- Basic Tabs starts -->
                                    <div class="">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="top-news-tab" data-bs-toggle="tab"
                                                    href="#top_news" aria-controls="top_news" role="tab"
                                                    aria-selected="true">Top News</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" id="top-music-articles-tab" data-bs-toggle="tab"
                                                    href="#top_music_articles" aria-controls="top_music_articles" role="tab"
                                                    aria-selected="false">Top Music Articles</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" id="trending-reads-tab" data-bs-toggle="tab"
                                                    href="#trending_reads" aria-controls="trending_reads" role="tab"
                                                    aria-selected="true">Trending Reads</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" id="astrology-tab" data-bs-toggle="tab"
                                                    href="#astrology" aria-controls="astrology" role="tab"
                                                    aria-selected="false">Astrology</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="music-tab" data-bs-toggle="tab"
                                                    href="#music" aria-controls="music" role="tab"
                                                    aria-selected="false">Music</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="criket-tab" data-bs-toggle="tab"
                                                    href="#cricket" aria-controls="cricket" role="tab"
                                                    aria-selected="true">Cricket</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="bollywood-tab" data-bs-toggle="tab"
                                                    href="#bollywood" aria-controls="bollywood" role="tab"
                                                    aria-selected="true">Bollywood</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="movie-review-tab" data-bs-toggle="tab"
                                                    href="#movie_reviews" aria-controls="movie_reviews" role="tab"
                                                    aria-selected="true">Movie Reviews</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="news-around-world-tab" data-bs-toggle="tab"
                                                    href="#news_around_world" aria-controls="new_around_world" role="tab"
                                                    aria-selected="true">News Around World</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" id="government-schemas-tab" data-bs-toggle="tab"
                                                    href="#government_schemas" aria-controls="government_schemas" role="tab"
                                                    aria-selected="true">Government Schemmas</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="top_news"
                                                aria-labelledby="top-news-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $top_news = [];
                                                                $top_music_articles = [];
                                                                $trending_reads = [];
                                                                $astrology = [];
                                                                $music = [];
                                                                $cricket = [];
                                                                $bollywood = [];
                                                                $movie_reviews = [];
                                                                $news_around_world = [];
                                                                $government_schemas = [];
                                                                $other_category = [];

                                                                foreach ($blogs as $blog) {
                                                                    if ($blog->category == 'top_news') {
                                                                        array_push($top_news, $blog);
                                                                    } elseif ($blog->category == 'top_music_articles') {
                                                                        array_push($top_music_articles, $blog);
                                                                    } elseif ($blog->category == 'trending_reads') {
                                                                        array_push($trending_reads, $blog);
                                                                    } elseif ($blog->category == 'astrology') {
                                                                        array_push($astrology, $blog);
                                                                    }else if($blog->category == 'music'){
                                                                        array_push($music, $blog);
                                                                    }else if($blog->category == 'cricket'){
                                                                        array_push($cricket, $blog);
                                                                    }else if($blog->category == 'bollywood'){
                                                                        array_push($bollywood, $blog);
                                                                    }else if($blog->category == 'movie_reviews'){
                                                                        array_push($movie_reviews, $blog);
                                                                    }else if($blog->category == 'news_around_world'){
                                                                        array_push($news_around_world, $blog);
                                                                    }else if($blog->category == 'government_schemas'){
                                                                        array_push($government_schemas, $blog);
                                                                    }else{
                                                                        array_push($other_category, $blog);
                                                                    }
                                                                }
                                                            @endphp
                                                            @foreach ($top_news as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="top_music_articles"
                                                aria-labelledby="top-music-articles-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($top_music_articles as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#"
                                                                            class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="trending_reads"
                                                aria-labelledby="trending-reads-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="title">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($trending_reads as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#"
                                                                            class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="astrology"
                                                aria-labelledby="astrology-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($astrology as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#"
                                                                            class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="music"
                                                aria-labelledby="music-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($music as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="cricket"
                                                aria-labelledby="cricket-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cricket as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="bollywood"
                                                aria-labelledby="bollywood-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($bollywood as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="movie_reviews"
                                                aria-labelledby="movie-reviews-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($movie_reviews as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news_around_world"
                                                aria-labelledby="news-around-world-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($news_around_world as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="government_schemas"
                                                aria-labelledby="government-schemas-tab" role="tabpanel">
                                                <div id="table_data">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="orderby" data-name="id">ID</th>
                                                                <th class="orderby" data-name="name">Blog Title</th>
                                                                <th class="orderby" data-name="ordering">Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($government_schemas as $raw)
                                                                <tr>
                                                                    <td>{{ $raw->id }}</td>
                                                                    <td>{{ $raw->title }}</td>
                                                                    <td>{{ ucfirst(str_replace('_', ' ', $raw->category)) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="admin-blog/{{ $raw->id }}/edit"
                                                                            class="me-1" data-bs-html="true"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="edit" id="del_row"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit font-small-4 me-50">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        <a href="#" class="me-1 remove-blog"
                                                                            data-bs-html="true"
                                                                            data-id="{{ $raw->id }}"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="delete">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{-- {!! $beach->links() !!} --}}

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Tabs ends -->

                        </div>
                    </div>
            </div>
        </div>
        </section>
        <!--/ Basic table -->
    </div>
    </div>
    </div>

    <div class="vertical-modal-ex">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Delete!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <h5 class="modal-title" id="exampleModalCenterTitle">Are You Sure!!</h5>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary accept" id="del" data-id=""
                            data-bs-dismiss="modal">Accept</button>
                        <button type="button" class="btn btn-danger reject" id="reg"
                            data-bs-dismiss="modal">Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
    <!-- END: Page JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        // $(document).on('click', '.pagination a', function(event) {
        //     event.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1];
        //     fetch_data(page);
        // });

        // function fetch_data(page) {
        //     $.ajax({
        //         url: "/admin/admin-popular-cities-search/fetch_data?page=" + page,
        //         success: function(data) {
        //             $('#table_data').html(data);
        //         }
        //     });
        // }
        // $(document).on('keyup', '#citySearch', function() {
        //     let city = $('#citySearch').val();
        //     $.ajax({
        //         url: "/admin/admin-popular-cities-search/fetch_data?city=" + city,
        //         success: function(data) {
        //             $('#table_data').html(data);
        //         }
        //     });
        // })

        // $(document).on('click', '.orderby', function() {
        //     let orderby = $(this).attr('data-name');
        //     console.log(orderby);
        //     $.ajax({
        //         url: "/admin/admin-popular-cities-search/fetch_data?orderby=" + orderby,
        //         success: function(data) {
        //             $('#table_data').html(data);
        //         }
        //     });
        // });

        $(document).on("click", ".remove-blog", function() {
            $("#exampleModalCenter").modal('show');
            var id = $(this).attr('data-id');
            $('.accept').attr('data-id', id);
        });

        $(document).on("click", ".accept", function() {

            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");

            var url = "{{ url('/') }}" + "/admin/admin-blog/" + id;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {

                    if (response.status) {
                        toastr.success(
                            response.message
                        );
                        location.reload();
                    } else {
                        toastr.error(
                            response.message
                        );
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    alert(xhr.responseText);
                    alert(url);
                    $(document).text(xhr.responseText);
                    alert(thrownError);
                }
            });
        });




        // $(document).on('click', '.remove-city-category', function() {

        //     var id = $(this).attr('data-id');
        //     var token = $("meta[name='csrf-token']").attr("content");

        //     var url = "{{ url('/') }}" + "/admin/admin-cities-category/" + id;

        //     $.ajax({
        //         url: url,
        //         type: 'DELETE',
        //         data: {
        //             "id": id,
        //             "_token": token,
        //         },
        //         success: function(response) {

        //             if (response.status) {
        //                 toastr.success(
        //                     response.message
        //                 );
        //                 location.reload();
        //             } else {
        //                 toastr.error(
        //                     response.message
        //                 );
        //             }
        //         },
        //         error: function(xhr, ajaxOptions, thrownError) {
        //             console.log(xhr.status);
        //             alert(xhr.responseText);
        //             alert(url);
        //             $(document).text(xhr.responseText);
        //             alert(thrownError);
        //         }
        //     });

        // })
    </script>
@endsection
