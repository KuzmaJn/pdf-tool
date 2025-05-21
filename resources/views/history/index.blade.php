<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.history') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Action Buttons -->
            <div class="mb-4 flex justify-end space-x-4">
                <form method="POST"
                      action="{{ route('history.export') }}"
                      class="px-2">
                    @csrf
                    <x-primary-button>
                        {{ __('messages.exportToCSV') }}
                    </x-primary-button>
                </form>

                <form id="deleteAllForm" method="POST" action="{{ route('history.destroyAll') }}">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="button" onclick="showDeleteAllModal()">
                        {{ __('messages.deleteAll') }}
                    </x-danger-button>
                </form>
            </div>

            <!-- History Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('messages.id') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('messages.user') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('messages.serviceId') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('messages.interface') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('messages.usedAt') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('messages.location') }}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($histories as $history)
                            <tr>
                                <td class="px-4 py-2">{{ $history->id }}</td>
                                <td class="px-4 py-2">{{ $history->user->email ?? $history->user_id }}</td>
                                <td class="px-4 py-2">{{ $history->service_id }}</td>
                                <td class="px-4 py-2">{{ $history->interface }}</td>
                                <td class="px-4 py-2">{{ $history->used_at }}</td>
                                <td class="px-4 py-2">{{ $history->location }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-2 text-center text-gray-500">{{ __('messages.noHistoryRecords') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $histories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete All Confirmation Modal -->
    <div id="deleteAllModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
        <div class="bg-white rounded p-6 shadow-lg max-w-sm sm:max-w-xs text-center">
            <p class="mb-6 text-center">{{ __('messages.deleteAllConfirm') }}</p>
            <div class="flex justify-center space-x-4">
                <div class="px-2">
                    <x-secondary-button onclick="closeDeleteAllModal()">
                        {{ __('messages.cancel') }}
                    </x-secondary-button>
                </div>
                <x-danger-button onclick="proceedDeleteAll()">
                    {{ __('messages.deleteAll') }}
                </x-danger-button>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function showDeleteAllModal() {
        document.getElementById('deleteAllModal').classList.remove('hidden');
    }
    function closeDeleteAllModal() {
        document.getElementById('deleteAllModal').classList.add('hidden');
    }
    function proceedDeleteAll() {
        document.getElementById('deleteAllForm').submit();
    }
</script>
