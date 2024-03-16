    <div class="mt-10">
        <p class="font-semibold">イベント詳細</p>
    </div>

    <p class="mt-3 mb-2 ml-0.5">場所</p>
    <input type="text" name="location" value="{{ $formData['location'] ?? ''  }}" class="py-3 pl-3 pr-32 drop-shadow-md rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="渋谷、千葉 など">

    <p class="mt-6 mb-2 ml-0.5">予約時間</p>
    <input type="time" name="reservation_time" value="{{ $formData['reservation_time'] ?? '' }}" step="300" class="py-3 pl-3 pr-3 drop-shadow-md rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">

    <p class="mt-6 mb-2 ml-0.5">食事系統</p>
    <input type="text" name="cuisine_type" value="{{ $formData['cuisine_type'] ?? '' }}" class="py-3 pl-3 pr-32 drop-shadow-md rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="焼き鳥, 海鮮, 中華 など">

    <p class="mt-6 mb-2 ml-0.5">お店の雰囲気の希望</p>
    <select name="ambiance" class="py-3 pl-3 pr-6 drop-shadow-md rounded-lg text-sm focus:ring-2 focus:ring-custom-accent1 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" placeholder="選択してください">
        <option value="">選択してください</option>
        <option value="1" @if($formData['ambiance'] ?? '' === "1") selected @endif>カジュアル</option>
        <option value="2" @if($formData['ambiance'] ?? '' === "2") selected @endif>フォーマル</option>
        <option value="3" @if($formData['ambiance'] ?? '' === "3") selected @endif>カジュアルフォーマル</option>
    </select>

    <div>
        <button class="mt-10 py-3 px-4 w-36 h-12 drop-shadow-lg flex justify-center items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-orange text-white disabled:opacity-50 disabled:pointer-events-none">
            確定
        </button>
    </div>