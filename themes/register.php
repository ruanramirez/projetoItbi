<?php $v->layout("_theme.php"); ?>

<div class="container">
    <div class="row content">
        <div class="col-md-12 mt-5">
            <form method="POST" action="<?= $router->route('web.validateRegister') ?>" class="form-register">
                <fieldset>
                    <div class="d-flex flex-row-reverse mb-5">
                        <a href="<?= $router->route('web.home'); ?>" class="btn btn-secondary">Voltar</a>
                    </div>

                    <h3>Formulário de cadastro</h3>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Matrícula</label>
                            <input name="company_number" type="text" class="form-control"
                                   placeholder="123456-7" id="company_number" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Cargo</label>
                            <select name="user_type" id="inputState" class="form-control" required>
                                <option selected>Selecione</option>
                                <option value="2">Auditor fiscal</option>
                                <option value="3">Coordenador</option>
                                <option value="4">Funcionário</option>
                            </select>
                            <div class="invalid-feedback"></div>

                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="inputAddress">Nome completo</label>
                        <input name="name" type="text" class="form-control"  placeholder="" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <h4>Dados da conta</h4>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">E-mail</label>
                            <input name="email" type="email" class="form-control" "
                                   placeholder="seuemail@mail.com" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Senha</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   placeholder="Inserir senha" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword5">Confirmar Senha</label>
                            <input name="password_confirm" type="password" class="form-control" id="password_confirm"
                                   placeholder="Inserir senha novamente" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-dark">Enviar</button>
                        <button type="reset" class="btn btn-secondary">Cancelar</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $v->start('scripts') ?>
<script>
    $(document).ready(function () {
        $("#company_number").mask("000000-0");
    });

    $(".form-register").on('submit', function (e) {
        e.preventDefault();
        //armazena o forulario submetido em _thisForm
        const _thisForm = $(this);

        //limpa qualquer validacao
        _thisForm.find(".is-invalid").removeClass("is-invalid").next().text("");

        let validate = true;

        //validacao campos em branco backend
        _thisForm.find("[name=name], [name=email], [name=password], [name=company_number], [name=user_type]").each(function () {
            if (!$(this).val()) {
                $(this).addClass("is-invalid").next().text("Campo obrigatório!");
                validate = false;
            }
        })

        if (!validate) {
            return false;
        }

        const data = _thisForm.serialize();

        const fieldsetDisable = _thisForm.find("fieldset");
        fieldsetDisable.attr("disabled", true);

        $.ajax({
            url: _thisForm.attr("action"),
            type: _thisForm.attr("method"),
            data: data,
            dataType: "json"
        }).done(function (data) {

            //validacao campos em branco back-end


            //validacao de campos de formato invalido
            if (data.formatInvalid) {
                for (let prop in data.formatInvalid) {
                    _thisForm.find(`[name=${prop}]`).addClass("is-invalid").next().text(data.formatInvalid[prop]);
                }
            }

            if (data.registerVal == "pswError") {
                swal({
                    title: "Atenção",
                    text: "Sua combinação de senha está incorreta.",
                    icon: "warning",
                    button: "Entendi",
                });
            } else if (data.registerVal == "success") {
                swal({
                    title: "Sucesso",
                    text: "Cadastro realizado com sucesso!",
                    icon: "success",
                    button: "Entendi",
                });
            }

            if (data.required) {
                //forEach(arrays as key => value)
                $.each(data.required, function (index, value) {
                    _thisForm.find(`[name=${value}]`).addClass("is-invalid").next().text("Campo obrigatório!");
                });
            }
        }).fail(function () {
            console.log("Erro!");
        }).always(function () {
            fieldsetDisable.removeAttr("disabled");
        })
    })
</script>
<?php $v->end() ?>
