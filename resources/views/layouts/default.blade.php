<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.0/milligram.css">
  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
  @yield('style')
</head>

<body>
  <header class="header">
    <ul class="ul">
      <li class="user">{{ $user -> name }}
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
          {{ __('ログアウト') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
    <h1 class="title"><a href="{{ route('index') }}">GoalTimer</a></h1>
    @yield('link')
    <h2 class="page-title">@yield('page-title')</h2>
  </header>
  <main class="main">
    @yield('content')
  </main>
  <footer>

  </footer>
</body>

</html>
