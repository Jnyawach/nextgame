<div>
    <form wire:submit.prevent="AddFavorite">
        <input type="hidden" value="{{$fixture}}" wire:model="fixture">
        <button type="submit" class="btn btn-link" title="Add to Favorite"><i class="fal fa-star"></i></button>
    </form>
</div>
