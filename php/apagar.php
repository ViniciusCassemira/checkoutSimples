    <?php
    require_once 'conexao.php';
    $conexao = getConexao();

    $sql = "DELETE FROM cartao";
    $stm = $conexao->prepare($sql);
    $stm->execute();
    ?>

    <script>
        confirm('Todos os registros foram apagados');
        window.location.href = '/index.html';
    </script>