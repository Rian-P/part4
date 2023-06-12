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
      
      <form class="flex flex-col" method="POST" action="">
  @csrf
                
  <div class="relative inline-block">
    <a class="block text-black text-sm font-bold mb-3 ml-2">new password</a>
    <input class="rounded-lg border border-gray-300 mb-3 px-2 py-2 w-full" name="password" type="password" placeholder="Tulis katasandi di sini" required />
    <svg class="absolute top-10 right-4" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M12.36 12.2301C11.6915 12.7691 10.8587 13.063 10 13.063C9.14131 13.063 8.30849 12.7691 7.64 12.2301C7.43579 12.0604 7.17251 11.9787 6.90808 12.0031C6.64365 12.0275 6.39974 12.1559 6.23 12.3601C6.06027 12.5643 5.9786 12.8276 6.00298 13.092C6.02736 13.3565 6.15579 13.6004 6.36 13.7701C7.38134 14.6227 8.66957 15.0898 10 15.0898C11.3304 15.0898 12.6187 14.6227 13.64 13.7701C13.8442 13.6004 13.9726 13.3565 13.997 13.092C14.0214 12.8276 13.9397 12.5643 13.77 12.3601C13.686 12.259 13.5828 12.1754 13.4665 12.1142C13.3501 12.0529 13.2229 12.0152 13.0919 12.0031C12.8275 11.9787 12.5642 12.0604 12.36 12.2301ZM7 9.00012C7.19779 9.00012 7.39113 8.94147 7.55557 8.83159C7.72002 8.72171 7.8482 8.56553 7.92388 8.38281C7.99957 8.20008 8.01937 7.99901 7.98079 7.80503C7.9422 7.61105 7.84696 7.43287 7.70711 7.29302C7.56726 7.15316 7.38908 7.05792 7.19509 7.01934C7.00111 6.98075 6.80005 7.00056 6.61732 7.07624C6.43459 7.15193 6.27842 7.2801 6.16853 7.44455C6.05865 7.609 6 7.80234 6 8.00012C6 8.39744 6.15804 8.77942 6.43934 9.06072C6.72064 9.34203 7.10262 9.50007 7.5 9.50007H7ZM13.64 9.00012C13.8378 9.00012 14.0311 8.94147 14.1956 8.83159C14.3601 8.72171 14.4883 8.56553 14.564 8.38281C14.6397 8.20008 14.6595 7.99901 14.6209 7.80503C14.5823 7.61105 14.487 7.43287 14.3471 7.29302C14.2073 7.15316 14.0291 7.05792 13.8351 7.01934C13.6411 6.98075 13.4401 7.00056 13.2574 7.07624C13.0747 7.15193 12.9186 7.2801 12.8087 7.44455C12.6988 7.609 12.64 7.80234 12.64 8.00012C12.64 8.39744 12.798 8.77942 13.0793 9.06072C13.3606 9.34203 13.7426 9.50007 14.14 9.50007H13.64ZM10 0.500122C5.30558 0.500122 1.50003 4.30567 1.50003 9.00012C1.50003 10.3176 1.91472 11.5765 2.65846 12.5795C3.4022 13.5824 4.4355 14.2498 5.60711 14.4641C5.81548 14.5045 6.00063 14.6362 6.11186 14.8282C6.22309 15.0203 6.2535 15.2585 6.19819 15.4857C6.14288 15.713 6.00422 15.9104 5.80503 16.0193C5.60584 16.1282 5.36858 16.137 5.14748 16.0423C4.92638 15.9476 4.74984 15.755 4.66421 15.5208C4.57859 15.2865 4.59141 15.0247 4.6996 14.8179C4.80779 14.6112 5.00209 14.4684 5.22296 14.4458C3.61882 14.172 2.17207 13.2285 1.18934 11.8111C0.206605 10.3937 -0.0861684 8.67296 0.238643 6.98111C0.563455 4.69861 2.22787 2.9329 4.49321 2.38967C6.75855 1.84645 9.24145 2.38967 11.5068 2.9329C13.7721 3.47614 15.4365 4.90681 15.7614 7.18931C15.8856 7.9473 15.817 8.72941 15.569 9.42897C15.3211 10.1285 14.9032 10.7144 14.362 11.095C13.8208 11.4755 13.1837 11.6357 12.54 11.5461C12.397 11.5295 12.2551 11.5144 12.1145 11.5019C10.8691 11.3611 9.61437 11.3611 8.36904 11.5019C8.22844 11.5144 8.08653 11.5295 7.94353 11.5461C7.29985 11.6357 6.66273 11.4755 6.12147 11.095C5.58021 10.7144 5.16227 10.1285 4.91439 9.42897C4.66651 8.72941 4.59794 7.9473 4.72214 7.18931C5.04795 4.90681 6.71135 3.47614 8.97669 2.9329C11.242 2.38967 13.725 1.84645 16.9904 2.38967C19.2558 2.9329 20.9202 4.69861 21.245 6.98111C21.5698 8.67296 21.2772 10.3937 20.2945 11.8111C19.3118 13.2285 17.865 14.172 16.2609 14.4458C16.4818 14.4684 16.6761 14.6112 16.7843 14.8179C16.8925 15.0247 16.9053 15.2865 16.8197 15.5208C16.7341 15.755 16.5576 15.9476 16.3365 16.0423C16.1154 16.137 15.8781 16.1282 15.679 16.0193C15.4798 15.9104 15.3411 15.713 15.2858 15.4857C15.2305 15.2585 15.2609 15.0203 15.3721 14.8282C15.4834 14.6362 15.6685 14.5045 15.8769 14.4641C17.0485 14.2498 18.0818 13.5824 18.8255 12.5795C19.5693 11.5765 19.984 10.3176 19.984 9.00012C19.984 4.30567 16.1784 0.500122 11.484 0.500122H10Z"/>
    </svg>
  </div>
  
  <div class="relative inline-block">
    <a class="block text-black text-sm font-bold mb-3 ml-2">konfirmasi password</a>
    <input class="rounded-lg border border-gray-300 mb-3 px-2 py-2 w-full" name="confirm_password" type="password" placeholder="Konfirmasi katasandi di sini" required />
  </div>

  <div class="relative inline-block">
  <a class="block text-black text-sm font-bold mb-3 ml-2">Kode</a>
  <div class="flex mb-3">
    <input class="rounded-lg border border-gray-300 px-2 py-2 w-1/4 mr-1" name="code1" type="text" pattern="[0-9]" maxlength="1" required />
    <input class="rounded-lg border border-gray-300 px-2 py-2 w-1/4 mr-1" name="code2" type="text" pattern="[0-9]" maxlength="1" required />
    <input class="rounded-lg border border-gray-300 px-2 py-2 w-1/4 mr-1" name="code3" type="text" pattern="[0-9]" maxlength="1" required />
    <input class="rounded-lg border border-gray-300 px-2 py-2 w-1/4" name="code4" type="text" pattern="[0-9]" maxlength="1" required />
  </div>

</div>



  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Simpan
  </button>
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