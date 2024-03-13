<div>
    @if($is_in_cart)
        <div class="input-group" style="width: 100px;">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border" wire:click="decrement">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="text" class="form-control form-control-sm text-center border-0 input-number" wire:change="hand_input($event.target.value)" value="{{$amount}}">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border" wire:click="increment">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    @else
        <button href="#" wire:click="add_to_cart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> {{__('В корзину')}}</button>
    @endif
</div>
