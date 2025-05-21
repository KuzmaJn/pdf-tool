{{-- resources/views/profile/partials/api-keys.blade.php --}}
<section class="space-y-6" x-data="apiKeys()" x-init="init()">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('API kľúče') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Tu môžeš vytvoriť, zobraziť a odstrániť svoje API kľúče.') }}
        </p>
    </header>

    {{-- Zoznam API kľúčov --}}
    <div class="mt-6 space-y-4">
        <template x-for="key in keys" :key="key.id">
            <div class="flex items-center justify-between bg-white p-4 shadow rounded">
                <div>
                    <p class="font-semibold text-indigo-600" x-text="key.name"></p>
                    <p class="text-sm text-gray-500">
                        {{ __('Platné do:') }}
                        <span x-text="key.expires_at ? new Date(key.expires_at).toLocaleString() : '{{ __('Nikdy') }}'"></span>
                    </p>
                </div>
                <button
                    @click="deleteKey(key.id)"
                    class="text-red-600 hover:text-red-800 text-sm"
                >
                    {{ __('Odstrániť') }}
                </button>
            </div>
        </template>
        <div x-show="keys.length === 0" class="text-gray-500">
            {{ __('Zatiaľ nemáš žiadne API kľúče.') }}
        </div>
    </div>

    {{-- Formulár na nový kľúč --}}
    <form @submit.prevent="createKey()" class="mt-6 space-y-6">
        <div>
            <x-input-label for="api_key_name" :value="__('Názov kľúča')" />
            <x-text-input
                id="api_key_name"
                x-model="newName"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Môj nový kľúč') }}"
            />
        </div>

        <div>
            <x-input-label for="api_key_expires" :value="__('Platnosť kľúča')" />
            <select
                id="api_key_expires"
                x-model.number="newExpires"
                class="mt-1 block w-full border-gray-300 rounded-md"
            >
                <option value="60">{{ __('1 hodina') }}</option>
                <option value="1440">{{ __('1 deň') }}</option>
                <option value="10080">{{ __('1 týždeň') }}</option>
                <option value="43200">{{ __('1 mesiac') }}</option>
                <option value="525000">{{ __('1 rok') }}</option>
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">
                {{ __('Vytvoriť kľúč') }}
            </x-primary-button>
            <template x-if="plainText">
                <p class="text-sm text-gray-600 break-all" x-text="plainText"></p>
            </template>
        </div>
    </form>
</section>

<script>
    function apiKeys() {
        return {
            keys: [],
            newName: '',
            newExpires: 60,
            plainText: '',

            async init() {
                this.fetchKeys();
            },

            async fetchKeys() {
                try {
                    let res = await fetch('/api-keys', {
                        headers: { 'Accept': 'application/json' },
                        credentials: 'same-origin'
                    });
                    this.keys = await res.json();
                } catch (e) {
                    console.error(e);
                }
            },

            async deleteKey(id) {
                if (!confirm('{{ __('Naozaj zmazať tento kľúč?') }}')) return;
                await fetch(`/api-keys/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                });
                this.fetchKeys();
            },

            async createKey() {
                try {
                    let res = await fetch('/api-keys', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({ name: this.newName, expires_in: this.newExpires })
                    });
                    if (res.status === 422) {
                        // validation errors
                        let data = await res.json();
                        alert(Object.values(data.errors).flat().join('\n'));
                        return;
                    }
                    let data = await res.json();
                    this.plainText = data.plainText;
                    this.newName = '';
                    this.newExpires = 60;
                    this.fetchKeys();
                } catch (e) {
                    console.error(e);
                }
            }
        }
    }
</script>
