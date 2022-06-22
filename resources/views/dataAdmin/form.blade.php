<input type="hidden" name="level" value="admin" size="50" maxlength="30">

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('nama', 'Nama Admin Baru', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('email', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
            <div class="input-group-prepend" style="cursor: pointer" onclick="showPassword('password')">
                <div class="input-group-text py-2"><i class="fas fa-eye"></i></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('confirmPassword', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirmPassword']) !!}
            <div class="input-group-prepend" style="cursor: pointer" onclick="showPassword('confirmPassword')">
                <div class="input-group-text py-2"><i class="fas fa-eye"></i></div>
            </div>
        </div>
    </div>
</div>
