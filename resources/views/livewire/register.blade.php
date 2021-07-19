<div>
    <form wire:submit.prevent="submitForm">
        @csrf
        @error('role_id')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="input-group mb-3">
            <select id="role_id" name="role_id" class="form-control" placeholder="Role" wire:model="role_id">
                <option value="">Choose Role</option>
                <!-- <option value="1">Student</option>
                <option value="2">Teacher</option> -->
                <?php $roles = App\Role::all(); ?>
                <?php
                foreach ($roles as $role) {
                    echo '<option value="'.$role->id.'">'.$role->name.'</option>';
                }
                ?>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user-tag"></span>
                </div>
            </div>
        </div>
        @error('ic')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="input-group mb-3">
            <input type="text" id="ic" name="ic" class="form-control" placeholder="IC Number" maxlength="12" wire:model="ic">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-id-card"></span>
                </div>
            </div>
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="input-group mb-3">
            <input type="text" id="name" name="name" class="form-control" placeholder="Full name" maxlength="255" wire:model="name">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <span class="text-danger" style="display:none" id="email_error">Email already used</span>
        <div class="input-group mb-3">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" maxlength="255" wire:model="email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button id="btnRegister" type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
