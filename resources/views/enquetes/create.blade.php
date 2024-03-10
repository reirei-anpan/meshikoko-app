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
        <p class="text-2xl mt-14 border-b-2 divide-slate-200 pb-3">イベントを作成</p>
      </div>
      <div class="flex flex-row mt-10">
          <p class="mr-3 text-xl bg-custom-accent1">Setp1</p>
          <p class="text-xl">イベント名の決定</p>
      </div>
      <input type="text" class="mt-3 py-3 pl-3 pr-32 drop-shadow-md block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="同期飲み会 など">

      <div class="flex flex-row mt-10">
        <p class="mr-3 text-xl bg-custom-accent1">Setp2</p>
        <p class="text-xl">名前を入力</p>
      </div>
      <input type="text" class="mt-3 py-3 pl-3 pr-32 drop-shadow-md block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="山田 太郎 など">

      <div class="flex flex-row mt-10">
        <p class="mr-3 text-xl bg-custom-accent1">Setp3</p>
        <p class="text-xl">お店の情報を入力</p>
      </div>

      <div class="flex flex-row items-center mt-4">
        <p class="py-3">場所</p>
        <input type="text" class="ml-16 py-3 pl-3 pr-32 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="渋谷、千葉 など">
      </div>

      <div class="flex flex-row items-center mt-4">
        <p class="py-3">予約時間</p>
        <input type="time" value="17:00" step="300" class="ml-8 py-3 pl-3 pr-3 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
      </div>

      <div class="flex flex-row items-center mt-4">
        <p class="py-3">食事系統</p>
        <input type="text" class="ml-8 py-3 pl-3 pr-32 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="焼き鳥, 海鮮, 中華 など">
      </div>

      <div class="flex flex-row items-center mt-4">
        <p class="py-3">雰囲気</p>
        <select class="ml-12 py-3 pl-3 pr-6 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="選択してください">
          <option value="">選択してください</option>
          <option value="1">カジュアル</option>
          <option value="2">フォーマル</option>
          <option value="3">カジュアルフォーマル</option>
        </select>
      </div>

      <button type="button" class="mt-10 py-3 px-4 drop-shadow-lg inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-accent2 text-white disabled:opacity-50 disabled:pointer-events-none">
        イベントを作成
      </button>

    </div>
  </div>
</body>