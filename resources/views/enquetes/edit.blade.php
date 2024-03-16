<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="max-w-[770px] mx-auto font-custom">
  <div class="bg-custom-bg pb-20">

    <x-header />

    <form method="POST" action="{{ route('enquetes.enquete_update') }}">
      @csrf
      <input type="hidden" name="id" value="{{ $enquete->id }}">
      <div class="pl-10">
        <div style="width: 70%;">
          <p class="text-2xl text-custom-orange font-semibold mt-14">イベントを編集</p>
        </div>

        <div class="bg-white mt-3 px-8 py-8 rounded-lg">
          <div>
              <p class="font-semibold">イベント名</p>
          </div>
          <input type="text" name="event_name" value="{{ $enquete->event_name}}" class="mt-3 py-3 pl-3 pr-32 shadow-custom-input rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="同期飲み会 など">

          <div class="mt-10">
            <p class="font-semibold">あなたの名前</p>
          </div>
          <input type="text" name="name" value="{{ $enquete->name }}" class="mt-3 py-3 pl-3 pr-32 shadow-custom-input rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="山田 太郎 など">

          <x-event-details-input-form :form-data="$enquete" />

        </div>

      </div>
    </form>
  </div>
</body>
