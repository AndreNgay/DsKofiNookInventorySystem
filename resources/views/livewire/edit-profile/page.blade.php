<!-- resources/views/livewire/edit-profile.blade.php -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form>
                <div class="row mb-3">
                    <!-- Left Column: Personal Information -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" wire:model="name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Contact Number -->
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="number" name="contact_number" class="form-control"
                                        wire:model="contact_number">
                                    @error('contact_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Emergency Contact Name -->
                                <div class="mb-3">
                                    <label for="emergency_contact_name" class="form-label">Emergency Contact
                                        Name</label>
                                    <input type="text" name="emergency_contact_name" class="form-control"
                                        wire:model="emergency_contact_name">
                                    @error('emergency_contact_name') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Emergency Contact Relation -->
                                <div class="mb-3">
                                    <label for="emergency_contact_relation" class="form-label">Emergency Contact
                                        Relation</label>
                                    <input type="text" name="emergency_contact_relation" class="form-control"
                                        wire:model="emergency_contact_relation">
                                    @error('emergency_contact_relation') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Emergency Contact Number -->
                                <div class="mb-3">
                                    <label for="emergency_contact_number" class="form-label">Emergency Contact
                                        Number</label>
                                    <input type="number" name="emergency_contact_number" class="form-control"
                                        wire:model="emergency_contact_number">
                                    @error('emergency_contact_number') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- House Number -->
                                <div class="mb-3">
                                    <label for="house_number" class="form-label">House Number</label>
                                    <input type="text" name="house_number" class="form-control"
                                        wire:model="house_number">
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
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

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
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" wire:click="update">Update Profile</button>
                </div>
            </form>

        </div>
    </div>
</div>
