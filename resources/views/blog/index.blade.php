<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Stellar BLog | Blog {{$posts->user->username}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            border-bottom: 2px solid;
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ URL('/') }}">StellarBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$posts->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{ date('F j, Y', $posts->created_at->timestamp) }} by {{$posts->user->username}}</div>
                        <!-- Post categories-->
                        <div class="text-muted">Category:
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">#{{$posts->category->category_name}}</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">#Tag Adrian Sepuh</a>

                        </div>

                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/gambar/' . $posts->image_url) }}" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{$posts->content}}</p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            @if(Auth::check())
                            <!-- Comment form-->
                            <form action="{{ route('comments.store') }}" method="POST" class="d-flex">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                <textarea name="content" id="comments" class="form-control" rows="2" placeholder="Join the discussion and leave a comment!"></textarea>
                                <button class="btn btn-secondary" type="submit">Kirim</button>
                            </form>
                            <hr>
                            <br>
                            @endif
                                
                            @foreach($posts->comments as $comment)
                            <!-- Single comment-->
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" width="50px" height="50px" src="/img/moona_01.jpeg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{ $comment->user->username }}</div>
                                    {{ $comment->content }}
                                </div>
                            </div> <br>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form action="{{ route('home') }}" method="get">
                            <div class="input-group">
                                <input class="form-control" name="find" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categories['ganjil'] as $key)
                                    <li><a class="text-decoration-none" href="#!">{{$key->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categories['genap'] as $key)
                                    <li><a class="text-decoration-none" href="#!">{{$key->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                        <div class="card-header">Qoute's Daily</div>
                        <div class="card-body">"Ilmu yang sejati, seperti barang berharga lainnya, tidak bisa diperoleh dengan mudah. Ia harus diusahakan, dipelajari, dipikirkan, dan lebih dari itu, harus selalu disertai doa."</div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; StellaBlog</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>