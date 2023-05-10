<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['nome']) || empty($dados['email']) || empty($dados['cpf']) || empty($dados['genero'])) {
    $retorna = ['status' => false, 'msg' => "Erro! Preencha todos os campos obrigatórios!"];

} elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
    $retorna = ['status' => false, 'msg' => "Erro! Insira um email válido!"];

} elseif (!preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/", $dados['cpf'])) {
    $retorna = ['status' => false, 'msg' => "Erro! Insira um CPF válido!"];
	
} else {
	// Cria uma nova string com os dados do formulário
    $conteudo = '-------------------------------------'."\n".
                'Nome: '.$dados['nome'] ."\n". 
                'E-mail: '.$dados['email'] ."\n". 
                'CPF: ' .$dados['cpf'] ."\n". 
                'Gênero: '.$dados['genero']."\n" . 
                '-------------------------------------'."\n";
	// Salva a string no arquivo de texto
    file_put_contents('dados.txt', $conteudo, FILE_APPEND | LOCK_EX);
    $retorna = ['status' => true, 'msg' => "Sucesso"];
	
}

echo json_encode($retorna); 

/*// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];

// Valida os dados do formulário
if (empty($nome) || empty($email) || empty($cpf) || empty($genero)) {
    echo 'Por favor, preencha todos os campos.';

} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Por favor, informe um endereço de e-mail válido.';

} elseif (!preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $cpf)) {
    echo 'Por favor, informe um CPF válido.';

} else {
    // Cria uma nova string com os dados do formulário
    $newData = "Nome: $nome\nEmail: $email\nCPF: $cpf\nGênero: $genero\n\n";

    // Salva a string no arquivo de texto
    file_put_contents('data.txt', $newData, FILE_APPEND);

    echo 'Dados enviados com sucesso!';
}
*/
