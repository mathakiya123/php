<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attandence management</title>
    <link rel="stylesheet" href="./css/style.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <div class="container row mx-auto mt-5 w-50 p-5">
      <div class="col-md-5 mt-5">
        <img src="./images/login.png" class="w-100" alt="" />
      </div>
      <div class="col-md-7">
        <h3 class="text-white">Login Form</h3>
        <form action="\">
          <label for="name" class="form-label">Email</label>
          <input type="text" class="form-control" placeholder="Enter Email" />

          <label for="password" class="form-label mt-3">Password</label>
          <input
            type="password"
            class="form-control"
            placeholder="Enter Password"
          />

          <button class="btn btn-primary w-100 mt-4" value="submit">
            login
          </button>
        </form>
      </div>
    </div>
  </body>
</html>
