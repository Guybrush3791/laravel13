  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BLOG</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    <header>
      Hello to

      <b>
      @auth
        {{ Auth::user() -> name }}
      @else
        GUEST
      @endauth
      </b>

      <br>

      @auth
        <form action="{{ route('logout') }}" method="post">
          @csrf
          @method('POST')
          <input type="submit" name="" value="LOGOUT">
        </form>
        <a href="{{ route('post.create') }}">CREATE NEW POST</a>
      @else
        <a href="{{ route('login') }}">LOGIN</a>
      @endauth

      <br>

      @auth
        <form action="{{ route('user.image.set') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <input type="file" name="image"><br>
          <input type="submit" name="" value="SAVE IMAGE">
        </form>

      @endauth

      @auth

        @if(Auth::user() -> image)

          <img class="picture_profile" src="{{ asset('images/' . Auth::user() -> image) }}">

        @endif

      @endauth

    </header>

      @yield('content')

    <footer>
      FOOTER
    </footer>
  </body>
</html>
