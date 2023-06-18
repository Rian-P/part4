<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
    .body-bg {
        background-image: linear-gradient(315deg, #6b1f1f 0%, #6e0505 74%);
    }
    </style>
</head>

<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <img class="object-none object-top  w-full h-24" src="{{url('images/icon/iconbg.png')}}">
            <h1 class="text-4xl font-bold text-white text-center ">Login</h1>
        </a>
    </header>

<main class="login-form">
  <div class="container">
    <div class="flex justify-center">
      <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg">
          <div class="py-4 px-6">
            <h2 class="text-2xl font-bold mb-4">Reset Password</h2>

            <form action="{{ route('reset.password.post') }}" method="POST">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">

              <div class="mb-4">
                <label for="email_address" class="block font-semibold mb-1">E-Mail Address</label>
                <input type="text" id="email_address" class="bg-gray-100 form-input w-full" name="email" required autofocus>
                @if ($errors->has('email'))
                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                @endif
              </div>

              <div class="mb-4">
                <label for="password" class="block font-semibold mb-1">Password</label>
                <input type="password" id="password" class="bg-gray-100 form-input w-full" name="password" required autofocus>
                @if ($errors->has('password'))
                <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                @endif
              </div>

              <div class="mb-4">
                <label for="password-confirm" class="block font-semibold mb-1">Confirm Password</label>
                <input type="password" id="password-confirm" class="bg-gray-100 form-input w-full" name="password_confirmation" required autofocus>
                @if ($errors->has('password_confirmation'))
                <span class="text-red-500 text-sm">{{ $errors->first('password_confirmation') }}</span>
                @endif
              </div>

              <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                  Reset Password
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

</body>
</html>
