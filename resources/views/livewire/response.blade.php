<div>
    <form  wire:submit.prevent="createResponse">
        <div class="form-group row mt-3  wire:ignore">
            <div class="col-12">
                <style>
                    .ck-editor__editable {
                        min-height: 300px;
                    }
                </style>

                <label for="response" class="control-label">Type Response:</label><br>
                <textarea id="response" name="response" class="form-control mt-2" wire:model="response"
                          rows="8">
                </textarea>
                @error('response') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">SEND</button>
        </div>

    </form>
</div>
