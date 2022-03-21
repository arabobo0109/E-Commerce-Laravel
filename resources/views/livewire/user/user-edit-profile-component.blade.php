<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Profile
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form wire:submit.prevent ="updateProfile">
                        <div class="col-md-4">
                            @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="100%" /> 
                            @elseif ($image)
                                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" width="100%" />                           
                            @else
                                <img src="{{ asset('assets/images/profile/default.jpg') }}" width="100%" />
                            @endif
                            <input type="file" class="form-control" wire:model="newimage"/>
                        </div>
                        <div class="col-md-8">
                            <p><b>Name: </b><input type="text" class="form-control" wire:model="name"></p>
                            <p><b>Email: </b>{{ $email }}</p>
                            <p><b>Phone: </b><input type="text" class="form-control" wire:model="mobile"></p>
                            <hr>
                            <p><b>Line1: </b><input type="text" class="form-control" wire:model="line1"></p>
                            <p><b>Line2: </b><input type="text" class="form-control" wire:model="line2"></p>
                            <p><b>City: </b><input type="text" class="form-control" wire:model="city"></p>
                            <p><b>Division: </b><input type="text" class="form-control" wire:model="division"></p>
                            <p><b>Country: </b><input type="text" class="form-control" wire:model="country"></p>
                            <p><b>Zip Code: </b><input type="text" class="form-control" wire:model="zipcode"></p>
                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
