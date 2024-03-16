<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="max-w-[770px] mx-auto font-custom">
  <div class="bg-custom-bg pb-20">

    <x-header />

    <div class="px-10">
      <form method="POST" action="{{ route('enquete.update') }}">
        @csrf
          <div style="width: 70%;">
            <p class="text-2xl text-custom-orange font-semibold mt-14">候補を追加</p>
          </div>

          <div class="bg-white mt-3 px-8 py-8 rounded-lg">
            <input type="hidden" name="enquete_id" value="{{ $enquete->id }}">
            <div>
              <p class="font-semibold">あなたの名前</p>
            </div>
            <input type="text" name="name" class="mt-3 py-3 pl-3 pr-32 shadow-custom-input block rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="山田 太郎 など">

            <x-event-details-input-form />

          </div>
      </form>
    </div>

  </div>
</body>