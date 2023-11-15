<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Form | StellarBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="w-75 p-3">
        <div class="card">
            <div class="card-body">
                <form id="contactForm" action="{{ route('blog.store') }}" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="titleBlog">Title Blog</label>
                        <input class="form-control" id="titleBlog" type="text" placeholder="Tulis Ide mu disini" required/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">Content Blog</label>
                        <textarea class="form-control" id="content" type="text" placeholder="Puhh Sepuhhh Tulis dong Puhhh.. " style="height: 8rem;" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Category</label>
                        <select class="form-select" id="category" aria-label="Category">
                            @foreach ($categories as $value)
                            <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>