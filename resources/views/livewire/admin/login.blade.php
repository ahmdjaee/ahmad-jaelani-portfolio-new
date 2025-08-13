<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
  <!-- End layout styles -->
  <link href="../../assets/images/favicon.png" rel="shortcut icon" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              @if (session('message'))
                <div class="alert alert-primary">{{ session('message') }}</div>
              @endif
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Username or email *</label>
                  <input
                    class="form-control p_input"
                    name="email"
                    type="text"
                  >
                  @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input
                    class="form-control p_input"
                    name="password"
                    type="password"
                  >
                  @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="text-center">
                  <button class="btn btn-primary btn-block enter-btn" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
</body>

</html>
