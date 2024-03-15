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

    <form method="POST" action="{{ route('enquetes.vote_update', $enquete->unique_identifier) }}">
      @csrf
      <input type="hidden" name="id" value="{{ $vote->id }}">
      <div class="pl-10">
        <div style="width: 70%;">
          <p class="text-2xl mt-14 border-b-2 divide-slate-200 pb-3">イベントを編集</p>
        </div>

        <div class="flex flex-row mt-10">
          <p class="mr-3 text-xl bg-custom-accent1">Setp1</p>
          <p class="text-xl">名前を入力</p>
        </div>
        <input type="text" name="name" value="{{ $vote->name }}" class="mt-3 py-3 pl-3 pr-32 drop-shadow-md block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="山田 太郎 など">

        <div class="flex flex-row mt-10">
          <p class="mr-3 text-xl bg-custom-accent1">Setp2</p>
          <p class="text-xl">お店の情報を入力</p>
        </div>

        <div class="flex flex-row items-center mt-4">
          <p class="py-3">場所</p>
          <input type="text" name="location" value="{{ $vote->location }}" class="ml-16 py-3 pl-3 pr-32 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="渋谷、千葉 など">
        </div>

        <div class="flex flex-row items-center mt-4">
          <p class="py-3">予約時間</p>
          <input type="time" name="reservation_time" value="{{$vote->reservation_time }}" step="300" class="ml-8 py-3 pl-3 pr-3 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>

        <div class="flex flex-row items-center mt-4">
          <p class="py-3">食事系統</p>
          <input type="text" name="cuisine_type" value="{{ $vote->cuisine_type }}" class="ml-8 py-3 pl-3 pr-32 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="焼き鳥, 海鮮, 中華 など">
        </div>

        <div class="flex flex-row items-center mt-4">
          <p class="py-3">雰囲気</p>
          <select name="ambiance" class="ml-12 py-3 pl-3 pr-6 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="選択してください">
            <option value="">選択してください</option>
            <option value="1" @if($vote->ambiance === "1") selected @endif>カジュアル</option>
            <option value="2" @if($vote->ambiance === "2") selected @endif>フォーマル</option>
            <option value="3" @if($vote->ambiance === "3") selected @endif>カジュアルフォーマル</option>
          </select>
        </div>

        <button class="mt-10 py-3 px-4 drop-shadow-lg inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-accent2 text-white disabled:opacity-50 disabled:pointer-events-none">
          確定
        </button>

      </div>
    </form>
  </div>
</body>
