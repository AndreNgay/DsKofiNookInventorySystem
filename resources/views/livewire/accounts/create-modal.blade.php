<div wire:ignore.self class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createAccountModal">Generate Account(s)</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" wire:model="amount">
                    @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                @if(Auth::user()->role == 'admin')
                <div class="form-group mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" wire:model="role">
                        <option value="">Select Role</option>
                        <option value="employee">Employee</option>
                        <option value="owner">Owner</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role') <span class="text-danger">{{ $message }}
                    </span> @enderror
                </div>
                @endif


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="store">Store</button>
            </div>
        </div>
    </div>
</div>
