$(function() {
    controller.init();
});
var controller = {
    init: function() {
        this.AddUser();
        this.MaskInput();
        this.AddTime();
        this.AddPaymment();
        this.AddCouch();
        this.AddPlayer();
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

    AddTime: function() {
        $("#addTime").validate({
            rules: {
                nome: {
                    required: true
                }
            },
            messages: {
                nome: { required: "Obrigatório!" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.add-time');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".add-time"));
                //$inputs.prop("disabled", true);

                $.ajax({
                    url: "query/time/adicionar.php",
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
                                window.location.href = 'meu-time.php';
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

    AddPaymment: function() {
        $("#addPaymment").validate({
            rules: {
                paymment_date: {
                    required: true
                },
                paymment_month: {
                    required: true
                },
                paymment_value: {
                    required: true
                }
            },
            messages: {
                paymment_date: { required: "Obrigatório!" },
                paymment_month: { required: "Obrigatório!" },
                paymment_value: { required: "Obrigatório!" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.add-paymment');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".add-paymment"));
                //$inputs.prop("disabled", true);

                $.ajax({
                    url: "query/paymment/adicionar.php",
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
                                window.location.href = 'pay-register.php';
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

    AddCouch: function() {
        $("#AddCouch").validate({
            rules: {
                nome_couch: {
                    required: true
                },
                email_couch: {
                    required: true
                },
                telefone_couch: {
                    required: true
                },
                senha_couch: {
                    required: true
                }
            },
            messages: {
                nome_couch: { required: "Obrigatório!" },
                email_couch: { required: "Obrigatório!" },
                telefone_couch: { required: "Obrigatório!" },
                senha_couch: { required: "Obrigatório!" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.add-couch');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".add-couch"));
                //$inputs.prop("disabled", true);

                $.ajax({
                    url: "query/treinador/adicionar.php",
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
                                window.location.href = 'treinadores.php';
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

    AddPlayer: function() {
        $("#AddPlayer").validate({
            rules: {
                nome_jogador: {
                    required: true
                },
                email_jogador: {
                    required: true
                },
                telefone_jogador: {
                    required: true
                },
                link_jogador: {
                    required: true
                },
                senha_jogador: {
                    required: true
                }
            },
            messages: {
                nome_jogador: { required: "Obrigatório!" },
                email_jogador: { required: "Obrigatório!" },
                telefone_jogador: { required: "Obrigatório!" },
                senha_jogador: { required: "Obrigatório!" },
                link_jogador: { required: "Obrigatório!" }
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                var $form = $('.add-player');
                var $inputs = $form.find("input, select, button, textarea");
                var FormDados = new FormData(document.querySelector(".add-player"));
                //$inputs.prop("disabled", true);

                $.ajax({
                    url: "query/jogador/adicionar.php",
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
                                window.location.href = 'jogadores.php';
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
        $('#paymment_value').maskMoney({
            prefix:'R$ ',
            allowNegative: true,
            thousands:'.', decimal:',',
            affixesStay: true
        });
    }
}