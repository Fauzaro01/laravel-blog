@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif       

                @if ( Auth::user()->role == "admin" )
                    {{ Auth::user() }}
                    <br>
                @endif

                <a href="{{ route('blog.addblog') }}" class="btn btn-outline-dark"> Tambah Blog [ + ]</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Pemilik</th>
                            @endif
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <th>{{$blog->id}}</th>
                            @if(Auth::user()->role == 'admin')
                            <th>{{$blog->user->username}}</th>
                            @endif
                            <th>{{$blog->title}}</th>
                            <th>{{$blog->content}}</th>
                            <th>{{$blog->category_id}}</th>
                            <th>
                                <a href="{{ route('blog.page', $blog->id) }}" class="btn btn-outline-secondary d-block">View</a> &nbsp;
                                <form action="{{ route('blog.delete') }}" method="POST" style="display:inline">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>
    
@endsection