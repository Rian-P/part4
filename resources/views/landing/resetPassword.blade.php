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
<div class="max-w-4xl mx-auto mt-24">
  <div class="flex flex-col items-center justify-center  p-4 space-y-4 antialiased text-gray-900 ">
    <div class="w-full px-8 max-w-lg space-y-6 bg-white rounded-md py-16">
      <h1 class=" mb-6 text-3xl font-bold text-center">
        verifikasi email
      </h1>
      
      <form action="#" class="space-y-6 w-ful">
        <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-primary-100"
          type="email" name="email" placeholder="Email address" required="">
        <div>
            <a href="/konfirmasiPassword"
            class="w-full px-4 py-2 font-medium text-center text-white bg-indigo-600 transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1">
            Send
          </a>
        </div>
      </form>
      <div class="text-sm text-gray-600 items-center flex justify-between">
        <a  href="/login"><p class="text-gray-800 cursor-pointer hover:text-blue-500 inline-flex items-center ml-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
              clip-rule="evenodd" />
          </svg>
          Back</p>
    </a>
        <p class="hover:text-blue-500 cursor-pointer">Need help?</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>