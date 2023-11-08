<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login | MyBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="/css/auth.css" rel="stylesheet" />
  </head>
  <body>
    <main class="form-signin">
      <form method="post" action="/auth/register">
        @csrf
        <img class="mb-4 border-pp" src="/img/moona_01.jpeg" alt="" width="90" height="90"/>
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        <div class="form-floating">
          <input type="text" name="username" class="form-control" id="floatingInput" required/>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" required/>
          <label for="floatingPassword">Password</label>
        </div>
		<div>
        </div>
        <div class="checkbox mb-3">
          <label>
          Do you have account?  <a href="/login">Sign in</a>
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          Submit
        </button>
        <p class="mt-5 mb-3 text-muted">Created by @Fauzaro01 ♥</p>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
