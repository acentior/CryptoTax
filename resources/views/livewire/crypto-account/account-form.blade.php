<div class="flex flex-col pb-8 -mx-2 space-y-10 md:flex-row lg:-mx-5 md:space-y-0">
    <!-- Left Panel -->
    <div class="px-2 lg:px-5 md:w-1/2">
        <x-card :title="__('Exchanges & Blockchains')">
            @if($cryptoAccounts->count())
                <div class="p-4">
                    <ul>
                        @foreach($cryptoAccounts as $row)
                            <li class="@if(!$loop->last)mb-8 @endif">
                                {{ $row->getName() }}
                                <small>({{ moneyFormat($row->getBalanceSum()) }} USD)</small>

                                <div class="float-right">
                                    @if($row->hasAllCredentials())<x-button :disabled="$row->fetching_scheduled_at" size="sm" wire:click="fetch({{ $row->id }})">{{ __("Fetch") }}</x-button>@endif
                                    <x-button size="sm" wire:click="edit({{ $row->id }})" :disabled="$row->fetching_scheduled_at">{{ __("Edit") }}</x-button>
                                    <x-button variant="danger" :disabled="$row->fetching_scheduled_at" size="sm" wire:click="delete({{ $row->id }})">{{ __("Delete") }}</x-button>
                                </div>
                                <p class="text-xs">
                                    @if($row->hasAllCredentials())
                                        {{ __("Last fetched") }}: {{ $row->fetched_at ? $row->fetched_at->format("Y-m-d H:i") : __("never") }}
                                    @else
                                        <span class="text-danger">{{ __("Missing credentials") }}</span>
                                    @endif
                                    @if($row->fetching_scheduled_at)
                                        <br>{{ __("Fetching is scheduled") }}
                                    @endif
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($exchanges->count())
                <div class="p-4">
                    <h2 class="mb-2 text-lg"> {{ __("Add new account") }}</h2>
                    <select wire:model.defer="newAccountId" class="rounded-lg">
                        <option></option>
                        <optgroup label="Exchange">
                            @foreach($exchanges as $exchange)
                                <option value="{{ $exchange->id }}">{{ $exchange->getName() }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Blockchain">
                            @foreach($blockchains as $blockchain)
                                <option value="{{ $blockchain->id }}">{{ $blockchain->getName() }}</option>
                            @endforeach
                        </optgroup>
                    </select>

                    <x-button wire:click="add">Add</x-button>
                </div>
            @endif
        </x-card>
    </div>

    <!-- Right Panel -->
    @if($account)
        <div class="px-4 lg:px-5 md:w-1/2">
            <x-card :title="$account->getName()">
                @if($account->fetching_scheduled_at)
                    <p class="p-4">{{ __("Fetching is currently scheduled. You can't modify credentials until fetching is finished.") }}</p>
                @else
                    <form wire:submit.prevent="save">
                        <div class="p-4">
                            {{ $this->form }}

                            <div class="mt-4 text-center">
                                <x-button type="submit">{{ __("Save") }}</x-button>
                            </div>
                        </div>
                    </form>
                @endif
            </x-card>
        </div>
    @endif
</div>
