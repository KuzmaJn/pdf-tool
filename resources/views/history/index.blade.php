<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
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
                        {{ __('Export to CSV') }}
                    </x-primary-button>
                </form>
                <form method="POST"
                      action="{{ route('history.destroyAll') }}"
                      class=""
                      onsubmit="return confirm('Are you sure you want to delete all history records?');">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>
                        {{ __('Delete All') }}
                    </x-danger-button>
                </form>
            </div>

            <!-- History Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Service ID</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Interface</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Used At</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
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
                                <td colspan="7" class="px-4 py-2 text-center text-gray-500">No history records found.</td>
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
</x-app-layout>
