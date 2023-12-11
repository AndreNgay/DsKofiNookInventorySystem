<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif


                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" wire:model="address">
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- contact number -->
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" wire:model="contact_number">
                        @error('contact_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- emergency contact name -->
                    <div class="mb-3">
                        <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
                        <input type="text" name="emergency_contact_name" class="form-control"
                            wire:model="emergency_contact_name">
                        @error('emergency_contact_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- emergency contact relation -->
                    <div class="mb-3">
                        <label for="emergency_contact_relation" class="form-label">Emergency Contact Relation</label>
                        <input type="text" name="emergency_contact_relation" class="form-control"
                            wire:model="emergency_contact_relation">
                        @error('emergency_contact_relation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- emergency contact number -->
                    <div class="mb-3">
                        <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                        <input type="text" name="emergency_contact_number" class="form-control"
                            wire:model="emergency_contact_number">
                        @error('emergency_contact_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" wire:click="updateProfile">Update Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>