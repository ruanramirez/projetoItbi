<?php $v->layout("_theme.php") ?>
<div class="container">
    <h2>SEMEC - LAUDO DE AVALIAÇÃO DE IMÓVEIS</h2>
    <p>Formulário de requisição de avaliação:</p>
    <form action="laudoitbi.php" target="_blank" method="post">
        <div class="form-group">
            <label for="inscr">Inscrição imobiliária municipal:</label>
            <input type="number" class="form-control" id="inscr" name="inscr">
        </div>

        <div id="demo" class="collapse">
            <div class="form-group">
                <label for="ignore">Ignorar uma área de análise (faz o laudo ser gerado por área maior)</label>
                <select class="form-control" id="ignore" name="ignore">
                    <option value="" selected>Manter conforme o imóvel avaliado</option>
                    <option value="lote">Lote</option>
                    <option value="quadra">Quadra</option>
                    <option value="entorno">Entorno</option>
                </select>
            </div>
            <div class="form-group">
                <label for="force">Forçar padrão construtivo:</label>
                <select class="form-control" id="force" name="force">
                    <option value="" selected>Manter conforme o imóvel avaliado</option>
                    <option value="g">Popular</option>
                    <option value="e">Médio</option>
                    <option value="d">Médio-alto</option>
                    <option value="c">Alto</option>
                    <option value="b">Luxo</option>
                </select>
            </div>
            <div><button type="button" data-toggle="collapse" data-target="#demo3">Forçar outros dados do imóvel</button></div>
            <div id="demo3" class="collapse">
                <div class="form-group">
                    <label for="tipo">Forçar padrão construtivo:</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="" selected>Manter conforme o imóvel avaliado</option>
                        <option value="2 - CASA">Casa</option>
                        <option value="2 - APARTAMENTO">Apartemento</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="areat">UFR do Techo:</label>
                    <input type="number" class="form-control" id="trecho" name="trecho">
                </div>
                <div class="form-group">
                    <label for="areat">Área do Terreno:</label>
                    <input type="number" class="form-control" id="areat" name="areat">
                </div>
                <div class="form-group">
                    <label for="areac">Área Construída:</label>
                    <input type="number" class="form-control" id="areac" name="areac">
                </div>
                <p>&nbsp</p>
            </div>
        </div>
        <div class="form-group">
            <label for="avaliador">Auditor fiscal responsável</label>
            <select class="form-control" id="avaliador" name="avaliador" required>
                <option value="" selected>Selecionar o avaliador</option>
                <option value="ANIBAL JOSE FERNANDES FILHO (matr. 2010-9)">Anibal José</option>
                <option value="ELINE BATISTA DA SILVA (matr. 928874-0)">Eline Batista</option>
                <option value="JOSE CLAUDIO CELESTINO MADEIRO (matr. 2044-3)">Cláudio Madeiro</option>
                <option value="JOSÉ AILTON BARBOSA DOS SANTOS (matr. 928881-3)">José Ailton</option>
                <option value="Diocesar Taffarel (matr. 926293-8)">Taffarel</option>
                <option value="Paulo José Pedreira Guimarães (matr. 926289-0)">Paulo Guimarães</option>
                <option value="Fabio Henrique de Lima Soares (matr. 24597-6)">Fabio Soares</option>
                <option value="Jadir Luis de Angelo Pinto (matr. 929015-0)">Jadir Luis</option>
                <option value="Edson Pina Menezes Filho (matr. 24610-7)">Edson Pina</option>
                <option value="Rogério Brandão de Faria (matr. 24461-9)">Rogério Faria</option>
                <option value="Fabricio Amaral Ramires (matr. 24400-7)">Fabrício Ramires</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Avaliar</button>
    </form>

    <p><div><br><button data-toggle="collapse" data-target="#demo">MOSTRAR OPÇÕES PARA AVALIAÇÕES ALTERANTIVAS COM ANÁLISE HUMANA</button></div>
    <p><div><br><button data-toggle="collapse" data-target="#demo2">EFETUAR EXCLUSÃO DE GUIA DE ITBI DA ANÁLISE</button></div>
    <p></p>
    <div id="demo2" class="collapse">
        <form class="form-inline" action="excluir.php" method="post" target="_blank" >
            <div class="form-group">
                <label for="guia">Guia:</label>
                <input type="text" class="form-control" id="guia" name="guia">
            </div>
            <div class="form-group">
                <label for="indice">Código:</label>
                <input type="text" class="form-control" id="indice" name="indice">
            </div>
            <div class="form-group">
                <label for="processo">Processo:</label>
                <input type="text" class="form-control" id="processo" name="processo">
            </div>
            <button type="submit" class="btn btn-default">Excluir</button>
        </form>
    </div>
</div>