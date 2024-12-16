$(function() {
    controller.init();
});
var controller = {
    init: function() {
        this.AddUser();
        this.MaskInput();
    },

    AddUser: function() {
        $("#addUsuario").validate({
            rules: {
                nome: {
                    required: true
                },
                email: {
                    required: true
                },
                telefone: {
                    required: true
                },
                password: {
                    required: true
                },
                check_prefil: {
                    required: true
                }
            },
            messages: {
                nome: { required: "Obrigatório!" },
                cargo: { required: "Obrigatório!" },
                email: { required: "Obrigatório!" },
                telefone: { required: "Obrigatório!" },
                password: { required: "Obrigatório!" },
                check_prefil: { required: "Obrigatório!"}
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.add-usuario');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".add-usuario"));
                //$inputs.prop("disabled", true);

                $.ajax({
                    url: "query/usuario/adicionar.php",
                    type: "POST",
                    data: FormDados,
                    async: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(output) {
                        console.log(output);

                        $inputs.prop("disabled", false);

                        if (output.status === "sucesso") {
                            $(".alert.alert-success").show();
                            $(".alert.alert-success").html(output.mensagem);
                            setTimeout(function() {
                                $(".alert.alert-success").fadeOut();
                                window.location.href = 'login.php';
                            }, 4000);
                        } else if (output.status === "erroCat" || output.status === "erro") {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html(output.mensagem);
                            setTimeout(function() {
                                $(".alert.alert-danger").fadeOut();
                            }, 5000);
                        }
                    }
                });
                return false;
            }
        });
    },

    MaskInput: function() {
        $("#telefone").mask("(99) 99999-9999");
    }
}