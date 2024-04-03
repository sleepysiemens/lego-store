<div>
    @if($lock)
            <div class="form-item w-100 mb-3 position-relative">
                <input type="text" class="form-control" value="Новосибирская обл." readonly>
            </div>

            <div class="form-item w-100 mb-0 position-relative">
                <input type="text" class="form-control" value="Новосибирск" readonly>
            </div>
    @else
        <div class="form-item w-100 mb-3 position-relative">
            <input type="text" class="form-control"  wire:input="region_search($event.target.value)" wire:model.lazy="selected_region" placeholder="Регион">
            @if($show_regions)
                <div class="position-absolute card w-100 overflow-hidden" style="z-index: 2;">
                    <div class="card-body p-0">
                        @forelse ($region_search_results as $result)
                            <input type="button" value="{{ $result }}" class="btn d-block w-100 text-start m-0 py-2 px-2" style="cursor: pointer" wire:click="select_region($event.target.value)">
                        @empty
                            <p class="m-0 py-2 px-2">Ничего не найдено</p>
                        @endforelse
                    </div>
                </div>
            @endif

        </div>

        <div class="form-item w-100 mb-0 position-relative">
            <input type="text" class="form-control" wire:input="city_search($event.target.value)" wire:model.lazy="selected_city" placeholder="Город">
            @if($show_cities)
                <div class="position-absolute card w-100 overflow-hidden" style="z-index: 2;">
                    <div class="card-body p-0">
                        @forelse ($city_search_results as $result)
                            <input type="button" value="{{ $result->city }}" class="btn d-block w-100 text-start m-0 py-2 px-2" style="cursor: pointer" wire:click="select_city($event.target.value)">
                        @empty
                            <p class="m-0 py-2 px-2">Ничего не найдено</p>
                        @endforelse
                    </div>
                </div>
            @endif
        </div>
    @endif
        @switch($del_type)
            @case(1)

                @break
            @case(2)
                @include('livewire.delivery.cdek')
                @break
            @case(3)
                @include('livewire.delivery.boxberry')
                @break
            @case(4)

                @break
        @endswitch
</div>
