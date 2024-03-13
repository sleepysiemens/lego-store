<div>
    <div class="form-check">
        <input wire:click="delivery(1)" type="radio" class="form-check-input" id="Delivery-1" name="delivery_type" @if($type==1) checked @endif value="1">
        <label class="form-check-label" for="Delivery-1">{{__('Почта России')}}</label>
    </div>
    <hr>
    <div class="form-check">
        <input wire:click="delivery(2)" type="radio" class="form-check-input" id="Delivery-2" name="delivery_type" @if($type==2) checked @endif value="2">
        <label class="form-check-label" for="Delivery-2">{{__('CDEK')}}</label>
    </div>
    <hr>
    <div class="form-check">
        <input wire:click="delivery(3)" type="radio" class="form-check-input" id="Delivery-3" name="delivery_type" @if($type==3) checked @endif value="3">
        <label class="form-check-label" for="Delivery-3">{{__('BoxBerry')}}</label>
    </div>
    <hr>
    <div class="form-check">
        <input wire:click="delivery(4)" type="radio" class="form-check-input" id="Delivery-4" name="delivery_type" @if($type==4) checked @endif value="4">
        <label class="form-check-label" for="Delivery-4">{{__('Самовывоз г. Новосибирск')}}</label>
    </div>
</div>
