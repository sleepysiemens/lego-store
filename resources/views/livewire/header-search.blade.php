<div class="position-relative">
    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" wire:click="toggle"><i class="fas fa-search text-primary"></i></button>
    <div class="position-absolute h-100 top-0 me-4 @if(!$is_enabled) searchbar-hidden  @else searchbar @endif" style="right: 0">
        <div class="position-relative w-100 h-100">
            <input class="form-control h-100 rounded-pill position-absolute border-secondary" style="z-index: 2" placeholder="Поиск">
            <button class="btn border border-secondary btn-primary btn-md-square rounded-circle bg-white position-absolute" wire:click="toggle" style="right: 0; z-index: 3"><i class="fas fa-arrow-right text-primary"></i></button>
            <div class="position-absolute w-100 bg-primary top-0 bg-white card border-secondary " style="z-index: 1; border-radius: 25px">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
