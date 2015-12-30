<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::text('password', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_admin', 'Admin:') !!}
    {!! Form::checkbox('is_admin') !!}
</div>