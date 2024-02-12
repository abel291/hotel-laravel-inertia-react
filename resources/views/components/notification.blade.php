@if (session('success'))
    <div x-data="{ show: true }" class="max-w-7xl mx-auto my-4" x-transition.duration.500ms x-show="show">
        <div class="rounded-md p-4 bg-green-50 border border-green-300">
            <div class="flex items-center">
                <div class="flex-shrink">
                    <x-heroicon-m-check-circle class="w-5 h-5 text-green-400" />
                </div>
                <div class="ml-3">
                    <p class="text-green-700 font-medium text-sm">{{ session('success') }}</p>
                </div>
                <div class="ml-auto inline-flex">
                    <button class="inline" x-on:click="show=false">
                        <x-heroicon-m-x-mark class="w-5 h-5 text-green-500" />
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
