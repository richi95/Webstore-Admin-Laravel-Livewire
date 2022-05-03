<div wire:ignore.self class="modal fade" id="updatePurchaseModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="ids" wire:model.defer="ids">
                    <div class="form-group">
                        <label for="customer_name">Vásárló neve</label>
                        <input type="text" name="customer_name"
                            class="form-control @error('customer_name') is-invalid @enderror"
                            wire:model.defer="customer_name">
                        @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Megrendelés aktiválása</label>
                        <select class="form-control @error('status') is-invalid @enderror" wire:model.defer="status">
                            <option value="active">Aktív</option>
                            <option value="inactive">Inaktív</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="input-group">
                        <label for="#">E-számla feltöltése<span class="text-danger">*</span></label>
                        <input type="file" class="form-file-input" label="Fájl kiválasztása" id="file" name="#">
                        
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">E-számla feltöltése</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" wire:model.defer="bill">
                          <label class="custom-file-label" for="inputGroupFile01" wire:model.defer="bill"></label>
                        </div>
                        
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div> --}}
                    <div class="form-group">
                        <label for="bill">
                            <input type="file" name="bill" id="bill" class="@error('bill') is-invalid @enderror"
                                wire:model.defer="bill">
                            @error('bill')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                <button type="button" class="btn btn-primary"
                    wire:click.prevent="update({{ $ids }})">Mentés</button>
            </div>
            </form>
        </div>
    </div>
</div>
