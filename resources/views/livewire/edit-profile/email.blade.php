<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary ms-1"><span class="bi bi-arrow-right"
                                wire:click="update"> Next</span></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
