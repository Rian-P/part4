<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

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
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Reset Password</h2>
                @if (Session::has('message'))
                    <div class="bg-green-100 text-green-700 border border-green-400 px-4 py-3 rounded mb-4">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email_address" class="block text-sm font-medium text-gray-700 mb-1">E-Mail Address</label>
                        <input type="text" id="email_address" class="form-input w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-300">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

</body>
</html>
