<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="max-w-[770px] mx-auto">
  <div class="bg-custom-bg pb-20">

    <x-header />

    <div class="pl-10">
      <div style="width: 70%;">
        <p class="text-2xl mt-14 border-b-2 divide-slate-200 pb-3">イベント URL発行</p>
      </div>
      <div class="mt-4">
        <p>イベントが作成されました。以下のURLをメール等を使って皆に知らせてあげましょう。</p>
        <p>以降、このURLページにて各自の出欠情報を入力してもらいます。</p>
      </div>

      <div>
        <input type="hidden" id="hs-clipboard-tooltip-on-hover" value="http://127.0.0.1:8000/index/{{$enquete->unique_identifier}}">  {{-- 本番運用では、ここにURLを入れる --}}
      </div>

      <div class="mt-10">
        <button type="button" class="js-clipboard drop-shadow-lg [--is-toggle-tooltip:false] hs-tooltip relative py-3 px-4 inline-flex justify-between items-center gap-x-2 text-sm font-mono rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
          data-clipboard-target="#hs-clipboard-tooltip-on-hover"
          data-clipboard-action="copy"
          data-clipboard-success-text="Copied">
          <span style="max-width: 550px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
            http://127.0.0.1:8000/index/{{$enquete->unique_identifier}}
          </span>
          <span class=" border-s ps-3.5 dark:border-gray-700">
            <svg class="js-clipboard-default size-4 group-hover:rotate-6 transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
            <svg class="js-clipboard-success hidden size-4 text-green-600 rotate-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </span>
          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-slate-700" role="tooltip">
            <span class="js-clipboard-success-text">Copy</span>
          </span>
        </button>
      </div>

      <button type="button" class="mt-10 py-3 px-4 drop-shadow-lg inline-flex items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-custom-accent2 text-white disabled:opacity-50 disabled:pointer-events-none">
        <a href="{{ route('enquetes.index', $enquete->unique_identifier)}}">イベントページを表示</a>
      </button>
    </div>
  </div>

  {{--  CLIPBOARD
  ======================================================= --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
  <script>
    (function() {
      window.addEventListener('load', () => {
        const $clipboards = document.querySelectorAll('.js-clipboard');
        $clipboards.forEach((el) => {
          const clipboard = new ClipboardJS(el, {
            text: (trigger) => {
              const clipboardText = trigger.dataset.clipboardText;

              if (clipboardText) return clipboardText;

              const clipboardTarget = trigger.dataset.clipboardTarget;
              const $element = document.querySelector(clipboardTarget);

              if (
                $element.tagName === 'SELECT'
                || $element.tagName === 'INPUT'
                || $element.tagName === 'TEXTAREA'
              ) return $element.value
              else return $element.textContent;
            }
          });
          clipboard.on('success', () => {
            console.log('Text copied to clipboard successfully!');

            const $default = el.querySelector('.js-clipboard-default');
            const $success = el.querySelector('.js-clipboard-success');

            if ($default && $success) {
              $default.style.display = 'none';
              $success.style.display = 'block';

              setTimeout(function () {
                $success.style.display = '';
                $default.style.display = '';
              }, 800);
            }
          });
        });
      });
    })();
  </script>
</body>