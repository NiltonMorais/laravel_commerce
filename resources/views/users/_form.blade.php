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
    {!! Form::label('password_confirmation', 'Confirme sua senha:') !!}
    {!! Form::text('password_confirmation', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <div id="msgmCep"></div>
    {!! Form::label('cep', 'CEP:') !!}
    {!! Form::text('cep', null, ['class'=>'form-control']) !!}
    {!! Form::button('Buscar', ['class'=>'btn btn-default','onclick'=>'getAddress()']) !!}
</div>
<div class="form-group">
    {!! Form::label('address', 'Endereço:') !!}
    {!! Form::text('address', null, ['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('number', 'Número:') !!}
    {!! Form::text('number', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('district', 'Bairro:') !!}
    {!! Form::text('district', null, ['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('city', 'Cidade:') !!}
    {!! Form::text('city', null, ['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::text('state', null, ['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('complement', 'Complemento:') !!}
    {!! Form::text('complement', null, ['class'=>'form-control']) !!}
</div>