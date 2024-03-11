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

      <div class="mt-10 text-xl">
            <p>イベント名 : とある日の飲み会</p>
          </div>

          <div class="mt-10">
            {{$enqueteData->unique_identifier}}
          </div>

          <div class="flex flex-col mt-10">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg shadow overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-base font-semibold	 uppercase bg-custom-accent1">名前</th>
                        <th scope="col" class="px-6 py-3 text-start text-base font-semibold uppercase bg-custom-accent1">場所</th>
                        <th scope="col" class="px-6 py-3 text-start text-base font-semibold uppercase bg-custom-accent1">予約時間</th>
                        <th scope="col" class="px-6 py-3 text-start text-base font-semibold uppercase bg-custom-accent1">食事系統</th>
                        <th scope="col" class="px-6 py-3 text-start text-base font-semibold uppercase bg-custom-accent1">雰囲気</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                      {{-- オーナーの投票 --}}
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $enqueteData->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $enqueteData->location }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $enqueteData->reservation_time }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $enqueteData->cuisine_type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $enqueteData->ambiance }}</td>
                      </tr>
                      {{-- メンバーの投票 --}}
                      @forEach ($votes as $vote)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->location }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->reservation_time }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->cuisine_type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->ambiance }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <button type="button" class="mt-10 py-3 px-4 drop-shadow-lg inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-accent2 text-white disabled:opacity-50 disabled:pointer-events-none">
            候補を入力
          </button>

          <form method="POST" action="{{ route('enquete.update') }}">
            @csrf
              <input type="hidden" name="enquete_id" value="{{ $enqueteData->id }}">
              <div class="flex flex-row mt-10">
                <p class="mr-3 text-xl bg-custom-accent1">Setp1</p>
                <p class="text-xl">名前を入力</p>
              </div>
              <input type="text" name="name" class="mt-3 py-3 pl-3 pr-32 drop-shadow-md block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="山田 太郎 など">

              <div class="flex flex-row mt-10">
                <p class="mr-3 text-xl bg-custom-accent1">Setp2</p>
                <p class="text-xl">お店の情報を入力</p>
              </div>

              <div class="flex flex-row items-center mt-4">
                <p class="py-3">場所</p>
                <input type="text" name="location" class="ml-16 py-3 pl-3 pr-32 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="渋谷、千葉 など">
              </div>

              <div class="flex flex-row items-center mt-4">
                <p class="py-3">予約時間</p>
                <input type="time" name="reservation_time" value="17:00" step="300" class="ml-8 py-3 pl-3 pr-3 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
              </div>

              <div class="flex flex-row items-center mt-4">
                <p class="py-3">食事系統</p>
                <input type="text" name="cuisine_type" class="ml-8 py-3 pl-3 pr-32 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="焼き鳥, 海鮮, 中華 など">
              </div>

              <div class="flex flex-row items-center mt-4">
                <p class="py-3">雰囲気</p>
                <select name="ambiance" class="ml-12 py-3 pl-3 pr-6 drop-shadow-md border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="選択してください">
                  <option value="">選択してください</option>
                  <option value="1">カジュアル</option>
                  <option value="2">フォーマル</option>
                  <option value="3">カジュアルフォーマル</option>
                </select>
              </div>

              <button class="mt-10 py-3 px-4 drop-shadow-lg inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-accent2 text-white disabled:opacity-50 disabled:pointer-events-none">
                候補を確定
              </button>
          </form>
        </div>

  </div>
</body>