<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="max-w-[770px] mx-auto font-custom">
  <div class="bg-custom-bg pb-20">

    <x-header />

    <form method="POST" action="{{ route('votes.update', $enquete->unique_identifier) }}">
      @csrf
      <input type="hidden" name="id" value="{{ $vote->id }}">
      <div class="pl-10">
        <div style="width: 70%;">
          <p class="text-2xl text-custom-orange font-semibold mt-14">イベントを編集</p>
        </div>

        <div class="bg-white mt-3 px-8 py-8 rounded-lg">
          @if ($errors->any())
            <div class="alert alert-danger mb-10 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="pb-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <div>
            <p class="font-semibold">あなたの名前</p>
          </div>
          <input type="text" name="name" value="{{ $vote->name }}" class="mt-3 py-3 pl-3 pr-32 drop-shadow-md block rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="山田 太郎 など">

          <x-event-details-input-form :form-data="$vote" />

        </div>

      </div>
    </form>
  </div>
</body>
