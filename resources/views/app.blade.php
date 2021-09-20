<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body class="bg-gray-50">
    <main>
       @inertia
    </main>

    <footer class="bg-black ">
      <div class="grid grid-cols-6 px-10 py-5 justify-evenly text-gray-400">
        <div class="col-span-3">
          <span class="font-nunito  text-xl text-gray-300 ">Remote Company</span>
          <p>Resource management app demo.</p>
        </div>



      <div class="col-span-3">
        <ul>
        <li class="font-nunito text-md text-xl text-gray-300">Stack used</li>
          <li>Laravel</li>
          <li>Inertia</li>
          <li>Vue js</li>
          <li>Tailwindcss</li>
        </ul>
      </div>
  
      </div>

      <p class="text-center text-xs font-bold font-nunito text-gray-400 p-3"> &copy Resource Management Application 2021 </p>

    </footer>

  </body>
</html>