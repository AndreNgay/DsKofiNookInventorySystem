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
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if(Auth::user()->profile_made)
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" wire:model="password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control"
                                wire:model="confirm_password">
                            @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @else
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" wire:model="password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control"
                                wire:model="confirm_password">
                            @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif


                    </form>

                    @if(!Auth::user()->profile_made)
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary ms-1"><span class="bi bi-arrow-right"
                                wire:click="store"> Next</span></button>
                    </div>
                    @else
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary ms-1"><span class="bi bi-arrow-right"
                                wire:click="profile_made_store"> Next</span></button>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
