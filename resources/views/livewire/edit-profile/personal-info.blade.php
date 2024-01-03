<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form wire:submit.prevent="updateProfile">
                        <!-- House Number -->
                        <div class="mb-3">
                            <label for="house_number" class="form-label">House Number</label>
                            <input type="text" name="house_number" class="form-control" wire:model="house_number">
                            @error('house_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Street -->
                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" name="street" class="form-control" wire:model="street">
                            @error('street') <span class="text-danger">{{ $message }}</span> @enderror
</div>

                        <!-- Barangay -->
                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <input type="text" name="barangay" class="form-control" wire:model="barangay">
                            @error('barangay') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- City -->
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" wire:model="city">
                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Province  -->
                        <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" name="province" class="form-control" wire:model="province">
                            @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
   
                        <a href="/edit-profile" class="btn btn-primary"><span class="bi bi-arrow-left">
                                Back</span></a>
        
                        <button type="submit" class="btn btn-primary ms-1"><span class="bi bi-arrow-right"
                                wire:click="store"> Next</span></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
