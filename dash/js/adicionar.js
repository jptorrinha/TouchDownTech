$(function() {
    controller.init();
});
var controller = {
    init: function() {
        this.AddUser();
        this.addCliente();
        this.UpdateUser();
        this.MaskInput();
        this.updateCliente();
    },

    AddUser: function() {
        $("#addUsuario").validate({
            rules: {
                U_nome: {
                    required: true
                },
                U_cargo: {
                    required: true
                },
                U_email: {
                    required: true
                },
                U_telefone: {
                    required: true
                },
                U_senha: {
                    required: true
                },
                U_senhaConf: {
                    required: true,
                    equalTo: "#U_senha"
                }
            },
            messages: {
                U_nome: { required: "Obrigatório!" },
                U_cargo: { required: "Obrigatório!" },
                U_email: { required: "Obrigatório!" },
                U_telefone: { required: "Obrigatório!" },
                U_senha: { required: "Obrigatório!" },
                U_senhaConf: { required: "Obrigatório!", equalTo: "As senhas não conferem!" },
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
                                window.location.reload();
                            }, 3000);
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

    addCliente: function() {
        $("#addCliente").validate({
            rules: {
                C_nome: {
                    required: true
                },
                C_empresa: {
                    required: true
                },
                C_cargo: {
                    required: true
                },
                C_email: {
                    required: true
                },
                C_telefone: {
                    required: true
                },
                C_senha: {
                    required: true
                },
                C_senhaConf: {
                    required: true,
                    equalTo: "#C_senha"
                }
            },
            messages: {
                C_nome: { required: "Obrigatório!" },
                C_cargo: { required: "Obrigatório!" },
                C_empresa: { required: "Obrigatório!" },
                C_email: { required: "Obrigatório!" },
                C_telefone: { required: "Obrigatório!" },
                C_senha: { required: "Obrigatório!" },
                C_senhaConf: { required: "Obrigatório!", equalTo: "As senhas não conferem!" },
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.add-cliente');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".add-cliente"));
                $inputs.prop("disabled", true);

                $.ajax({
                    url: "query/cliente/adicionar.php",
                    type: "POST",
                    data: FormDados,
                    async: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(output) {
                        //console.log(output);

                        $inputs.prop("disabled", false);

                        if (output.status === "sucesso") {
                            $(".alert.alert-success").show();
                            $(".alert.alert-success").html(output.mensagem);
                            setTimeout(function() {
                                $(".alert.alert-success").fadeOut();
                                window.location.reload();
                            }, 2000);
                        } else if (output.status === "erroCat" || output.status === "erro") {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html(output.mensagem);
                            setTimeout(function() {
                                $(".alert.alert-danger").fadeOut();
                            }, 2000);
                        }
                    }
                });
                return false;
            }
        });
    },

    UpdateUser: function() {
        $("#editUsuario").validate({
            rules: {
                U_nome: {
                    required: true
                },
                U_cargo: {
                    required: true
                },
                U_email: {
                    required: true
                },
                U_telefone: {
                    required: true
                }
            },
            messages: {
                U_nome: { required: "Obrigatório!" },
                U_cargo: { required: "Obrigatório!" },
                U_email: { required: "Obrigatório!" },
                U_telefone: { required: "Obrigatório!" },
                U_senhaConf: { equalTo: "As senhas não conferem!" },
                U_level: { required: "Obrigatório!" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                var $form = $('.editar-usuario');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".editar-usuario"));
                $inputs.prop("disabled", true);

                $.ajax({
                    url: "query/usuario/update.php",
                    type: "POST",
                    data: FormDados,
                    async: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(output) {
                        //console.log(output);

                        $inputs.prop("disabled", false);

                        if (output.status === "atualizado") {
                            $(".alert.alert-success").show();
                            $(".alert.alert-success").html(output.mensagem);
                            setTimeout(function() {
                                $(".alert.alert-success").fadeOut();
                                window.location.reload();
                            }, 3000);
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

    updateCliente: function() {
        $("#updateCliente").validate({
            rules: {
                C_nome: {
                    required: true
                },
                C_empresa: {
                    required: true
                },
                C_cargo: {
                    required: true
                },
                C_email: {
                    required: true
                },
                C_telefone: {
                    required: true
                },
                C_senhaConf: {
                    equalTo: "#C_senha"
                }
            },
            messages: {
                C_nome: { required: "Obrigatório!" },
                C_cargo: { required: "Obrigatório!" },
                C_empresa: { required: "Obrigatório!" },
                C_email: { required: "Obrigatório!" },
                C_telefone: { required: "Obrigatório!" },
                C_senhaConf: { equalTo: "As senhas não conferem!" },
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.update-cliente');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".update-cliente"));
                $inputs.prop("disabled", true);

                $.ajax({
                    url: "query/cliente/update.php",
                    type: "POST",
                    data: FormDados,
                    async: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(output) {
                        //console.log(output);

                        $inputs.prop("disabled", false);

                        if (output.status === "atualizado") {
                            $(".alert.alert-success").show();
                            $(".alert.alert-success").html(output.mensagem);
                            setTimeout(function() {
                                $(".alert.alert-success").fadeOut();
                                window.location.reload();
                            }, 3000);
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
        $("#U_telefone").mask("(99) 99999-9999");
        $("#C_telefone").mask("(99) 99999-9999");
    }
}