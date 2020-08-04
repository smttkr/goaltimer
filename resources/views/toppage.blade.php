<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.0/milligram.css">
  <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
</head>

<body>
  <header>
    <h1 class="title">GoalTimer</h1>
  </header>
  <main>
    <div class='container'>
      <div class="form-box">
        <div id="login-box" class="">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>E-Mail Address</label>
            <div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div>
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div>
              <label for="remember" class="remember-label">Remember Me</label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            </div>
            <div>
              <button type="submit" class='button-outline'>
                ログイン
              </button>
              <button type="button" id="sign-up" class='button-outline'>新規登録</button><br>
              @if (Route::has('password.request'))
              <a class="" href="{{ route('password.request') }}">Forgot Your Password?</a>
              @endif
            </div>
          </form>
        </div>

        <div id="signup-box" class="hidden">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
              <label for="name">Name</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div>
              <label for="email">E-Mail Address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div>
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div>
              <label for="password-confirm">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <button type="submit" class="button-outline">登録</button>
            <button type="button" id="login" class="button-outline">ログイン</button>
          </form>
        </div>
      </div>
      <div class="image-box">
        <img src="{{ asset('/image\undraw_bear_market_ania.svg') }}" alt="">
      </div>
    </div>
  </main>
  <script src="{{ asset('js/top.js') }}"></script>
</body>

</html>
