<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "recursos/PHPMailer/Exception.php";
require "recursos/PHPMailer/PHPMailer.php";
require "recursos/PHPMailer/SMTP.php";

    class Email
    {
        //Atributos
        private $host = "smtp.gmail.com";                   //servidor do protocolo de envio de email     
        private $emailRemetente = "castrapet.f@gmail.com";  //email do remetente
        private $senhaRemetente = "#Castra2022Pet.";         //senha do remetente
        private $nomeRemetente = "PetCastra";               //nome do remetente
        private $porta = 465;                                //porta do servidor TCP (ver na função mail no PHP.ini)
        private $emailDestinatario;                         //email a ser enviado
        private $nomeDestinatario;                          //nome do destinatário
        private $nomeAnimal;                                //nome do Animal
        private $data;
        private $nomeClinica;
        private $ruaClinica;
        private $bairroClinica;
        private $numeroClinica;

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

            //Conteúdo da mensagem enviada
            $Conteudo = 
            "
            <h2>Olá $this->nomeDestinatario, aqui está as informações sobre a castração de seu animalzinho</h2>

            <p><b>Data: ".date('d-m-Y',strtotime($this->data))."<br/>
            Hora: ".date('H:i',strtotime($this->data))."</b></p>
            <p><b>Favor chegar até 10 minutos antes</b></p>

            <p><b>Clínica: </b>$this->nomeClinica <br/>
            <b>Endereço: </b>$this->ruaClinica, $this->numeroClinica - $this->bairroClinica, Franco da Rocha - SP</p>

            <h2>Orientações sobre a castração</h2>
            <ul>
                <li>A clínica vetérinária credenciada ficará responsével pelo contato e <u><b>agendamento</b></u> da castração - Será realizada três 
                    (03) tentativas de contato, caso não atenda, automaticamente perderá a vaga cadastrada.</li> 

                <li>Comparecer no horário agendado pele clínica.</li> 

                <li>O animal em <u><b>JEJUM</b></u>(sólido e líquido) <u><b>08 horas antes da castração</b></u> (Ex: a castração será ás 08hs da manhã, portanto, a última refeição 
                    deverá ser até as 23hs da noite).</li> 

                <li>É recomendado o uso de colar de proteção (elisabetano) ou a roupa cirúgica (você encontrará na clínica veterinária ou em petshop) 
                    procure em lugares mais baratos ou até mesmo empréstimo. </li>

                <li>Clínica veterinária já médica os animais, caso considerem necessário, a clínica poderá prescrever medicamentos 
                com nome genérico (menor custo) que podem ser comprados em farmácia humana.</li> 

                <li>Ter 18 anos ou mais e residir no município.</li>

                <li>Levar cobertor ou um lençol limpo.</li> 

                <li>Proprietário que não fizer a retirada do animal no horário estipulado pela clínica estará sujeito a aplicção do 
                Auto de Infração, conforme a Art 29 da Resolução SIMA n° 05/2021 e demais legislações federais, estaduais e municipais.</li> 

                <li>Em caso de motivo que impeça o animal à cirurgia de castração (fugiu, doença, castrou no particular, óbito e etc) 
                entrar em contato imediatamente com a clínica veterinária para comunicar o cancelamento da cirurgia.</li> 

                <li><u>Impedem o procedimento cirúgico:</u> Cio, prenhez, amamentação de filhotes com menos  de 45 dias, animais muito idosos 
                (acima de 08 anos) ou filhotes com menos de 03 meses.</li> 

                <li>Todos os animais passarão por uma avaliação clínica pelos médicos veterinários da clínica creddenciada e caso detectado 
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
                $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //criptografia do email
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
                $email->Subject = "✨ Informações da castração do(a) $this->nomeAnimal ✨";     //Assunto / Título
                
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
            <h2>Olá $this->nomeDestinatario, Foi observado que você não compareceu à castração de(a) $this->nomeAnimal</h2>

            <h2>Por esse ocorrido, foi dado a você uma penalidade que o impede de solicitar mais castrações por um determinado período de tempo.<br/>
            Caso haja um motivo plausível para esse ocorrido, entre em contato o mais breve possível para retirarmos essa punição.
            </h2>
            ";

            $email = new PHPMailer(true);

            try{
                
                //Configurações
                $email->isSMTP();
                $email->Host = $this->host;
                $email->SMTPAuth = true;
                $email->Username = $this->emailRemetente;
                $email->Password = $this->senhaRemetente;
                $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //criptografia do email
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
                $email->Subject = "AVISO DE AUSÊNCIA DA CASTRAÇÃO DE $this->nomeAnimal";     //Assunto / Título
                
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
    }


?>