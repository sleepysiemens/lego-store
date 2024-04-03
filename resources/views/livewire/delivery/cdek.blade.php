<div xmlns="http://www.w3.org/1999/html">
    @if($selected_pvz==null)
        @if($pvz!=null)
            <div class="card mt-3">
                <div class="card-body" style="height: 350px; overflow-y: scroll">
                    @foreach(json_decode($pvz) as $pv)
                        <div class="py-2 border-bottom border-secondary row" style="cursor: pointer" wire:click="select_cdek_pvz('{{$pv->name}}', '{{$pv->address}}')">
                            <h4>
                                {{$pv->name}}
                            </h4>
                            <p class="mb-0">
                                {{$pv->address}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif


    @else
        <div class="card mt-3 border-primary">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col">
                        @include('livewire.delivery.company_logo')
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a class="" wire:click="reset_pvz" style="cursor: pointer">изменить</a>
                    </div>
                </div>
                    <h4>
                        {{$selected_pvz}}
                    </h4>
                <p class="mb-0">
                    {{$selected_pvz_address}}
                </p>
            </div>
        </div>
    @endif

</div>
