<?php
class API {

    public function enviaConteudoParaAPI($conteudo){
        $ch = curl_init("http://localhost:5000/crypcom/block");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $conteudo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        
        if (curl_error($ch)) {
            echo 'Erro na comunicacao: ' . '<br>';
            echo '<br>';
            echo '<pre>';
            var_dump(curl_getinfo($ch));
            echo '</pre>';
            echo '<br>';
            var_dump(curl_error($ch));
        }

        curl_close($ch);

        return json_decode($result, true);
    }
}
?>