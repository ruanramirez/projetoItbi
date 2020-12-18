<?php $v->layout("_theme.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <form>
                <h3>Formulário de cadastro</h3>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="example@mail.com" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Cargo</label>
                        <select id="inputState" class="form-control">
                            <option selected>Selecione</option>
                            <option>Auditor fiscal</option>
                            <option>Coordenador</option>
                            <option>Funcionário</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Nome completo</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Matrícula</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="12345-6">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Senha</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="" required>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-primary">Limpar</button>
            </form>
        </div>
    </div>
</div>
