@extends('store.store')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar-se</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register.store') }}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nome</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Senha</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirme sua senha</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div id="msgmCep"></div>
                                <label class="col-md-4 control-label">CEP</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cep" id="cep" maxlength="8">
                                    <button type="button" id="botaoCPF" class="btn btn-default" onclick="getAddress()">
                                        Buscar
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Endereço</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" id="address"
                                           disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Número</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="number" id="number" maxlength="5">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Bairro</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="district" id="district"
                                           disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Cidade</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="city" id="city" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Estado</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="state" id="state" disabled="disabled">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Complemento</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="complement" id="complement">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function getAddress() {
        if ($("#cep").val()) {

            $('#msgmCep').html("");

            $.get('http://api.postmon.com.br/v1/cep/' + $("#cep").val(), function (data) {
                $('#msgmCep').html("<p class='alert alert-success'>CEP encontrado</p>");
                $('#address').val(data['logradouro'] ? data['logradouro'] : data['endereco']);
                $('#district').val(data['bairro']);
                $('#city').val(data['cidade']);
                $('#state').val(data['estado']);
            });
        }
        else {
            $('#cep').focus();
            $('#address').val("");
            $('#district').val("");
            $('#city').val("");
            $('#state').val("");
            $('#msgmCep').html("<p class='alert alert-danger'>Insira um CEP</p>");
        }


    }
</script>