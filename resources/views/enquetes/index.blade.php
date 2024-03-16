<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="max-w-[770px] mx-auto">
  <div class="bg-custom-bg pb-20">

    <x-header />

    <div class="px-10">
      <div style="width: 70%;">
        <p class="text-2xl text-custom-orange font-semibold mt-14">候補を入力</p>
      </div>

      <div class="bg-white mt-3 px-8 py-8 rounded-lg">
        <div class="text-lg font-semibold">
          <p>イベント名 : {{ $enqueteData->event_name }}</p>
        </div>

        <div class="flex flex-col mt-3">
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
                      <th scope="col" class="px-6 py-3 text-start text-base font-semibold uppercase bg-custom-accent1">編集</th>
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
                      <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500 underline "><a href="{{ route('enquete.edit', $enqueteData->id) }}">編集</a></td>
                    </tr>
                    {{-- メンバーの投票 --}}
                    @forEach ($votes as $vote)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->name }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->location }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->reservation_time }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->cuisine_type }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-base">{{ $vote->ambiance }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500 underline "><a href="{{ route('enquetes.votes_edit', $vote->id) }}">編集</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <button type="button" class="mt-10 py-3 px-4 shadow-custom-input inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-orange text-white disabled:opacity-50 disabled:pointer-events-none">
          <a href="{{ route('enquetes.votes_create', ['unique_identifier' => $enqueteData->unique_identifier]) }}">+ 候補を追加する</a>
        </button>
      </div>

    </div>
  </div>
</body>