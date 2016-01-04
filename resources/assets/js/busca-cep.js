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
