<div>
    @include('livewire.accounts.create-modal')
    @include('livewire.accounts.delete-modal')
    @include('livewire.accounts.recover-accounts-modal')
    <div class="row">
        <div class="col-md-8">
            <h2>Accounts List</h2>
        </div>
        <div class="col-md-2">
            <button wire:click="setArchivedUsers" type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                data-bs-target="#recoverAccountsModal">
                Recover Account(s)
            </button>
        </div>
        <div class="col-md-2">
            <button wire:click="create" type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                data-bs-target="#createAccountModal">
                Generate Account(s)
            </button>
        </div>
    </div>
    <hr />
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row mb-2">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by account name" aria-label="Search"
                id="query" name="query">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($users as $user)
                    @include('livewire.accounts.view-account-modal')
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->contact_number }}</td>
                        <td>
                            <div class="d-flex">
                                @if(Auth::user()->role == 'owner')
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#viewAccount{{$user->id}}">
                                    <span class="bi bi-eye-fill"> View</span>
                                </button> 
                                @if($user->role == 'owner' || $user->role == 'admin')
                                <button type="button" class="btn btn-primary ms-2"
                                    wire:click="resetPassword({{ $user->id }})" disabled>
                                    <span class="bi bi-skip-backward-fill"></i> Reset Password</span>
                                </button>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccount" wire:click="delete({{ $user->id }})" disabled>
                                    <span class="bi bi-trash-fill"> Delete</span>
                                </button>
                                @else
                                <button type="button" class="btn btn-primary ms-2"
                                    wire:click="resetPassword({{ $user->id }})">
                                    <span class="bi bi-skip-backward-fill"></i> Reset Password</span>
                                </button>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccount" wire:click="delete({{ $user->id }})">
                                    <span class="bi bi-trash-fill"> Delete</span>
                                </button>
                                @endif
                                @elseif(Auth::user()->role == 'admin')
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#viewAccount{{$user->id}}">
                                    <span class="bi bi-eye-fill"> View</span>
                                </button>
                                
                                @if($user->role == 'admin')
                                
                                <button type="button" class="btn btn-primary ms-2"
                                    wire:click="resetPassword({{ $user->id }})" disabled>
                                    <span class="bi bi-skip-backward-fill"></i> Reset Password</span>
                                </button>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccount" wire:click="delete({{ $user->id }})" disabled>
                                    <span class="bi bi-trash-fill"> Delete</span>
                                </button>
                                @else
                                <button type="button" class="btn btn-primary ms-2"
                                    wire:click="resetPassword({{ $user->id }})">
                                    <span class="bi bi-skip-backward-fill"></i> Reset Password</span>
                                </button>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccount" wire:click="delete({{ $user->id }})">
                                    <span class="bi bi-trash-fill"> Delete</span>
                                </button>
                                @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
