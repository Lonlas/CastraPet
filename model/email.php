<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "recursos/PHPMailer/Exception.php";
require "recursos/PHPMailer/PHPMailer.php";
require "recursos/PHPMailer/SMTP.php";

    class Email
    {
        //Atributos
        private $host = "smtp.office365.com";                                                //servidor do protocolo de envio de email     
        private $emailRemetente = "castrapet.franco@outlook.com";                           //email do remetente
        private $senhaRemetente = "pet.CastraF";                                            //senha do remetente
        private $nomeRemetente = "PetCastra";               //nome do remetente
        private $porta = 587;                               //porta do servidor TLS/STARTTLS/SSL
        private $emailDestinatario;                         //email a ser enviado
        private $nomeDestinatario;                          //nome do destinatário
        private $nomeAnimal;                                //nome do Animal
        private $data;
        private $nomeClinica;
        private $ruaClinica;
        private $bairroClinica;
        private $numeroClinica;
        private $codsenha;
        private $clitelefone;

        //Método get
        function __get($atributo)
        {
            return $this->$atributo;
        }
    
        //Método set
        function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        function enviarConfirmacao()
        {
            $Conteudo = 
            "
                <p><b>Olá, $this->nomeDestinatario!</b><br/>
                A castração do(a) $this->nomeAnimal foi agendada! Seguem informações:
                </p>

                <p><b>Data:</b> ".date('d-m-Y',strtotime($this->data))."<br/>
                <b>Hora:</b> ".date('H:i',strtotime($this->data))."</p>

                <p><b>Clínica: </b>$this->nomeClinica <br/>
                <b>Endereço: </b>$this->ruaClinica, $this->numeroClinica - $this->bairroClinica, Franco da Rocha - SP</p>
                <b>Telefone: </b>$this->telefoneClinica</p>

                <p><u>Chegar com 10 minutos de antecedência.</u></p>

                <h3>Orientações sobre a castração:</h3>
                <ul>
                    <li>A clínica veterinária credenciada ficará responsável pelo <u><b>contato e agendamento</b></u> da castração. <br/>Seram realizadas três 
                        (03) tentativas de contato, caso não atenda, automaticamente perderá a vaga cadastrada.</li> 

                    <li>Comparecer no horário agendado pele clínica.</li> 

                    <li>Deixar o animal em <u><b>JEJUM</b></u> (sólido e líquido) <u><b>08 horas antes da castração.</b></u> <br/>(Ex: a castração será ás 08hs da manhã, portanto, a última refeição 
                        deverá ser até as 23hs da noite).</li> 

                    <li>É recomendado o uso de colar de proteção (elisabetano) ou a roupa cirúgica (você encontrará na clínica veterinária ou em petshops) 
                        procure em lugares mais baratos ou até mesmo empréstimo. </li>

                    <li>A clínica veterinária já medica os animais, caso considerem necessário, a clínica poderá prescrever medicamentos 
                    com nome genérico (menor custo) que podem ser comprados em farmácia humana.</li> 

                    <li>Ter 18 anos ou mais e residir no município.</li>

                    <li>Levar cobertor ou um lençol limpo.</li> 

                    <li>O proprietário que não fizer a retirada do animal no horário estipulado pela clínica estará sujeito a aplicação de
                    Auto de Infração, conforme o Art 29 da Resolução SIMA n° 05/2021 e demais legislações federais, estaduais e municipais.</li> 

                    <li>Em caso de motivo que impeça o animal à cirurgia de castração (fugiu, doença, castrou no particular, óbito e etc), 
                        entrar em contato imediatamente com a clínica veterinária para comunicar o cancelamento da cirurgia.</li> 

                    <li><b>Impedem o procedimento cirúrgico:</b> Cio, prenhez, amamentação de filhotes com menos de 45 dias, animais muito idosos 
                    (acima de 08 anos) ou filhotes com menos de 03 meses.</li> 

                    <li>Todos os animais passarão por uma avaliação clínica pelos médicos veterinários da clínica credenciada e caso detectado 
                    alguma alteração o procedimento poderá ser cancelado ou remarcado.</li> 
                </ul>
            ";

            $email = new PHPMailer(true);

            try{
                
                //Configurações
                $email->isSMTP();
                $email->Host = $this->host;
                $email->SMTPAuth = true;
                $email->Username = $this->emailRemetente;
                $email->Password = $this->senhaRemetente;
                $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           //criptografia do email
                $email->Port = $this->porta;
                $email->CharSet = 'UTF-8';

                //Informações de quem enviou
                $email->setFrom($this->emailRemetente, $this->nomeRemetente); 
                $email->addReplyTo($this->emailRemetente);

                //endereço para qual será enviado o email

                $email->addAddress($this->emailDestinatario);

                //define se é html
                $email->isHTML(true);

                //Corpo do e-mail
                $email->Subject = "✨ Confirmação da castração do(a) $this->nomeAnimal ✨";     //Assunto / Título
                
                //conteúdo
                $email->Body = $Conteudo;

                $email->AltBody = 'Para conseguir ver esse e-mail corretamente,
                use um visualizador de e-mail com suporte a HTML';
                    
                //envia
                $email->send();

                echo "Mensagem enviada com sucesso";
            }
            catch(Exception $e)
            {
                echo 'Houve um erro: ' . $e;
            }
        }
        function enviarAviso()
        {

            //Conteúdo da mensagem enviada
            $Conteudo = 
            "
            <p><b>Olá, $this->nomeDestinatario.</b><br/>
            Notamos que você não compareceu a castração de $this->nomeAnimal agendada para ".date('d-m-Y',strtotime($this->data)).", 
            às ".date('H:i',strtotime($this->data))."</p>

            <p>Por este motivo, foi dado a você uma penalidade que o impede de solicitar mais castrações por um determinado período de tempo.<br/>
            Caso haja um motivo plausível para este ocorrido, entre em contato com a clínica o mais breve possível para a punição ser retirada e uma nova data ser definida.
            </p>
            ";

            $email = new PHPMailer(true);

            try{
                
                //Configurações

                $email->isSMTP();
                $email->Host = $this->host;
                $email->SMTPAuth = true;
                $email->Username = $this->emailRemetente;
                $email->Password = $this->senhaRemetente;
                $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           //criptografia do email
                $email->Port = $this->porta;
                $email->CharSet = 'UTF-8';

                //Informações de quem enviou
                $email->setFrom($this->emailRemetente, $this->nomeRemetente); 
                $email->addReplyTo($this->emailRemetente);

                //endereço para qual será enviado o email

                $email->addAddress($this->emailDestinatario);

                //define se é html
                $email->isHTML(true);

                //Corpo do e-mail
                $email->Subject = "Ausência na castração.";     //Assunto / Título
                
                //conteúdo
                $email->Body = $Conteudo;

                $email->AltBody = 'Para conseguir ver esse e-mail corretamente,
                use um visualizador de e-mail com suporte a HTML';
                    
                //envia
                $email->send();

                echo "Mensagem enviada com sucesso";
            }
            catch(Exception $e)
            {
                echo 'Houve um erro: ' . $e;
            }
        }
        function enviarRecuperacao()
        {
            //Conteúdo da mensagem enviada
            $Conteudo = 
            "
            <p><b>Recuperação de senha</b><br/>
            Foi solicitada a recuperação da senha na sua conta</p>
            
            <p>Codigo de Confirmação: <b>$this->codsenha</b></p>

            ";

            $email = new PHPMailer(true);

            try{
                
                //Configurações
                $email->isSMTP();                
                $email->SMTPDebug = 0;
                $email->Host = $this->host;
                $email->SMTPAuth = true;
                $email->Username = $this->emailRemetente;
                $email->Password = $this->senhaRemetente;
                $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           //criptografia do email
                $email->Port = $this->porta;
                $email->CharSet = 'UTF-8';

                //Informações de quem enviou
                $email->setFrom($this->emailRemetente, $this->nomeRemetente); 
                $email->addReplyTo($this->emailRemetente);

                //endereço para qual será enviado o email

                $email->addAddress($this->emailDestinatario);

                //define se é html
                $email->isHTML(true);

                //Corpo do e-mail
                $email->Subject = "Recuperar senha";     //Assunto / Título
                
                //conteúdo
                $email->Body = $Conteudo;

                $email->AltBody = "Foi soliciatada a recuperação da senha na sua conta \n\nCódigo de recuperação: $this->codsenha";
                    
                //envia
                $email->send();

                echo "Mensagem enviada com sucesso";
            }
            catch(Exception $e)
            {
                echo 'Houve um erro: ' . $e;
            }
        }
    }
?>