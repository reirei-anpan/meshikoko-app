<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="max-w-[770px] mx-auto">
  <div class="bg-custom-bg pb-20">
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full text-sm py-4 bg-custom-orange">
      <nav class="max-w-[85rem] w-full mx-auto pl-10 sm:flex sm:items-center" aria-label="Global">
        <img src="/images/meshikoko-icon.png" width="42" height="31" class="mr-2">
        <a class="flex-none text-2xl font-black text-white" href="#">メシココ</a>
      </nav>
    </header>

    <div class="pl-10">
      <div style="width: 70%;">
        <p class="text-2xl mt-14 border-b-2 divide-slate-200 pb-3">候補を入力する</p>
      </div>

      <button type="button" class="mt-10 py-3 px-4 drop-shadow-lg inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-accent2 text-white disabled:opacity-50 disabled:pointer-events-none">
        候補を入力
      </button>
    </div>

  </div>
</body>