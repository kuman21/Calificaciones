@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
            class="-mb-12"
            style="display: none;"
            x-show="show && message"
            x-init="
                document.addEventListener('alert-message', event => {
                    style = event.detail.style;
                    message = event.detail.message;
                    show = true;
                    setTimeout(() => show = false, 5000);
                });
            "
            x-transition:enter="ease-out duration-700"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-700"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">

    <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="p-3 sm:rounded-lg shadow-sm flex items-center justify-between flex-wrap" :class="{ 'bg-green-500': style == 'success', 'bg-red-700': style == 'danger' }">
            <div class="w-0 flex-1 flex items-center min-w-0">
                <span class="flex p-2 rounded-lg" :class="{ 'bg-green-600': style == 'success', 'bg-red-600': style == 'danger' }">
                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <p class="ml-3 font-medium text-sm text-white truncate" x-text="message"></p>
            </div>

            <div class="flex-shrink-0 sm:ml-3">
                <button
                    type="button"
                    class="-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition ease-in-out duration-150"
                    :class="{ 'hover:bg-green-600 focus:bg-green-600': style == 'success', 'hover:bg-red-600 focus:bg-red-600': style == 'danger' }"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>