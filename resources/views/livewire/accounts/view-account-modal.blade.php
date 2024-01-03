@foreach($users as $user)
<!-- Modal -->
<div class="modal fade" id="viewAccount{{$user->id}}" tabindex="-1" aria-labelledby="viewAccount{{$user->id}}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewAccount{{$user->id}}Label">View Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="https://cdn-icons-png.flaticon.com/128/64/64572.png" alt="Profile Picture"
                                    class="img-fluid rounded-circle mb-3">
                                <h3 class="mb-2">{{ $user->name }}</h3>
                                <p class="text-muted mb-4">{{ $user->role }}</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                                            <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}</li>
                                            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Address:</strong> 
                                                @if($user->profile_made)
                                                {{ $user->house_number }},
                                                {{ $user->street }},
                                                {{ $user->barangay }},
                                                {{ $user->city }},
                                                {{ $user->province }},
                                                @endif
                                            </li>
                                            <li class="list-group-item"><strong>Contact Number:</strong> {{ $user->contact_number }}</li>
                                            <li class="list-group-item"><strong>Emergency Contact Person:</strong> {{ $user->emergency_contact_name }}</li>
                                            <li class="list-group-item"><strong>Relation to Emergency Contact Person:</strong> {{ $user->emergency_contact_relation }}</li>
                                            <li class="list-group-item"><strong>Emergency Contact Number:</strong> {{ $user->emergency_contact_number }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach