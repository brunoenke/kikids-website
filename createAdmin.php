<?php
include("cabecalho.php");
require_once('functions.php') 
?>


<!DOCTYPE html>
<html lang="en">

<body>

    <form method="post" action="createAdmin.php">
    <?php echo display_error(); ?>
        <!-- php  = POST - form -->   
        <div class="text-center my-4">
            <h1 class="cadastroLogin">Cadastro</h1>
            <p>Por favor, preencha todos os campos abaixo.</p>
        </div>
        <!-- The carousel -->
    <div class="col-md-8 offset-md-2 mb-5">

                        <div class="col-md-6 col-sm-12 offset-lg-3 offset-md-4 mb-3 form-style" id="meuForm">

                            <label class="titulo">Nome</label>
                            <input class="form-control" type="text" name="username" id="nome" onblur="validaNome()" value="<?php echo $username; ?>">
                            <small><span class="helper-text"></span></small>

                            <label class="titulo mt-4">Tipo de usuário</label>
                            <div class="input-group">
                                <select class="form-control" name="user_type" id="user_type">
                                    <option value=""></option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option> 
                                </select>
                            </div>
                            <small><span class="helper-text mb-4"></span></small>
                            
                            <label class="titulo mt-4">Senha</label>
                            <input class="form-control col-md-6 col-sm-6" type="password" name="password_1" id="senha"
                                onblur="validaSenha()">
                            <small><span class="helper-text mb-3"></span></small>

                            <label class="titulo mt-4">Confirmar Senha</label>
                            <input class="form-control col-md-6 col-sm-6" type="password" name="password_2" id="confirmaSenha" onblur="validaConfirmaSenha()">
                            <small><span class="helper-text"></span></small>
                            <button class="btn btn-md btn-info col-md-3 col-sm-12 float-right" type="submit" name="register_btn" id="criar" style="display: inline">Criar</button>
                        </div>

            <div class="text-center col-md-6 offset-md-3 mt-4">
            </div>
        </div>
    </div> 
        
        
    </form>
    <script>
        const nome = document.getElementById('nome');
        const sobrenome = document.getElementById('sobrenome');
        const campoLogin = document.getElementById('login');
        const senha = document.getElementById('senha');
        const confirmaSenha = document.getElementById('confirmaSenha');
        const email = document.getElementById('email');
        const green = '#4CAF50';
        const red = '#F44336';
        // ======================================================== CAROUSEL ======================================================== //


        $(document).ready(function () {
            // Activate Carousel
            $("#myCarousel").carousel();

            // Enable Carousel Indicators
            $(".item1").click(function () {
                $("#myCarousel").carousel(0);
            });
            $(".item2").click(function () {
                $("#myCarousel").carousel(1);
            });
            $(".item3").click(function () {
                $("#myCarousel").carousel(2);
            });

            // Enable Carousel Controls
            $(".carousel-control-next").click(function () {
                $("#myCarousel").carousel("next");
            });

            $(".carousel-control-prev").click(function () {
                $("#myCarousel").carousel("prev");
            });


            $('#myCarousel').on('slide.bs.carousel', function onSlide(ev) {
                var id = ev.relatedTarget.id;
                switch (id) {
                    case "1":
                        document.getElementById("continuar").style.display = "inline";
                        document.getElementById("voltar").style.display = "none";
                        document.getElementById("criar").style.display = "none";
                        break;

                    case "2":
                        document.getElementById("voltar").style.display = "inline";
                        document.getElementById("continuar").style.display = "inline";
                        document.getElementById("criar").style.display = "none";
                        break;

                    case "3":
                        document.getElementById("voltar").style.display = "inliine";
                        document.getElementById("continuar").style.display = "none";
                        document.getElementById("criar").style.display = "inline";

                        break;
                    default:
                }
            })
        });
        // ======================================================== ======== ======================================================== //
        // ========================================================== NOME ========================================================== //
        function validaNome() {
            // check if is empty
            if (verificaSeVazio(nome)) return;
            // is if it has only letters
            if (!verificaSeApenasLetras(nome)) return;
            return true;
        }

        function validaSobreNome() {
            // check if is empty
            if (verificaSeVazio(sobrenome)) return;
            // is if it has only letters
            if (!verificaSeApenasLetras(sobrenome)) return;
            return true;
        }

        function validaLogin() {
            if (verificaSeVazio(campoLogin)) return;
            if (verificaLogin()) return;
            return true;
        }

        function validaSenha() {
            // Empty check
            if (verificaSeVazio(senha)) return;
            // Must of in certain length
            if (!meetLength(senha, 4, 100)) return;
            // check password against our character set
            // 1- a
            // 2- a 1
            // 3- A a 1
            // 4- A a 1 @
            if (!possuiCaracteres(senha, 3)) return;
            return true;
        }

        function validaConfirmaSenha() {
            // If they match
            if (senha.value !== confirmaSenha.value) {
                tornaInvalido(confirmaSenha, 'As senhas devem coincidir');
                return;
            } else {
                tornaValido(confirmaSenha);
            }
            return true;
        }



        function verificaSeVazio(field) {
            if (estaVazio(field.value.trim())) {
                // set field invalid
                tornaInvalido(field, `${field.name} não pode estar vazio`);
                return true;
            } else {
                // set field valid
                tornaValido(field);
                return false;
            }
        }

        function verificaSeApenasLetras(field) {
            if (/^[a-zA-Z ]+$/.test(field.value)) {
                tornaValido(field);
                return true;
            } else {
                tornaInvalido(field, `${field.name} deve conter apenas letras`);
                return false;
            }
        }

        function estaVazio(value) {
            if (value === '') return true;
            return false;
        }

        function tornaValido(field, message) {
            document.getElementById(field.id).style.borderColor = green;
            field.nextElementSibling.innerHTML = '';
            field.nextElementSibling.style.color = green;
        }

        function tornaInvalido(field, message) {
            document.getElementById(field.id).style.borderColor = red;
            field.nextElementSibling.innerHTML = message;
            field.nextElementSibling.style.color = red;
        }
        // ========================================================== ==== ========================================================== //

        // ========================================================== LOGIN ========================================================== //

        function meetLength(field, minLength, maxLength) {
            if (field.value.length >= minLength && field.value.length < maxLength) {
                tornaValido(field);
                return true;
            } else if (field.value.length < minLength) {
                tornaInvalido(
                    field,
                    `${field.name} deve ter no mínimo ${minLength} caracteres`
                );
                return false;
            } else {
                tornaInvalido(
                    field,
                    `${field.name} deve ser mais curta que ${maxLength} caracteres`
                );
                return false;
            }
        }
        function possuiCaracteres(field, code) {
            let regEx;
            switch (code) {
                case 1:
                    // letters
                    regEx = /(?=.*[a-zA-Z])/;
                    return matchWithRegEx(regEx, field, 'Must contain at least one letter');
                case 2:
                    // letter and numbers
                    regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
                    return matchWithRegEx(
                        regEx,
                        field,
                        'Must contain at least one letter and one number'
                    );
                case 3:
                    // uppercase, lowercase and number
                    regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
                    return matchWithRegEx(
                        regEx,
                        field,
                        'Deve conter ao menos uma letra maiúscula, uma letra minúscula e um número!'
                    );
                case 4:
                    // Email pattern
                    regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return matchWithRegEx(regEx, field, 'Deve ser um email válido!');
                default:
                    return false;
            }
        }
        function matchWithRegEx(regEx, field, message) {
            if (field.value.match(regEx)) {
                tornaValido(field);
                return true;
            } else {
                tornaInvalido(field, message);
                return false;
            }
        }

        //     // ========================================================== CNPJ ========================================================== //
        document.getElementById('cnpj').addEventListener('blur', validaCNPJ);
        function validaCNPJ() {
            var cnpj = document.getElementById('cnpj').value;
            cnpj = cnpj.replace(/\D/g, '');
            if (cnpj.length < 11 || cnpj.length > 14) {
                tornaInvalido('cnpj', "CPF/CNPJ inválido! Por favor tente novamente.");
                stopPropagation();
            };

            if (cnpj.length == 11) {
                stopPropagation();
            };

            fetch('https://www.receitaws.com.br/v1/cnpj/' + cnpj)
                .then((res) => res.json())

                .then((dados) => {
                    if (dados.status == "ERROR") {
                        alert("Parece que esse CNPJ não é válido, tente novamente!");
                        stopPropagation();
                    };
                    document.getElementById('empresa').value = (dados.nome);
                    document.getElementById('cep').value = (dados.cep);
                    document.getElementById('rua').value = (dados.logradouro);
                    document.getElementById('bairro').value = (dados.bairro);
                    document.getElementById('cidade').value = (dados.municipio);
                    document.getElementById('uf').value = (dados.uf);
                })
        }


        //     // ========================================================== ==== ========================================================== //

        //     // ========================================================== CEP ========================================================== //
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "";
                    document.getElementById('bairro').value = "";
                    document.getElementById('cidade').value = "";
                    document.getElementById('uf').value = "";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
        // ========================================================== === ========================================================== //
    </script>
    

</body>

</html>
<?php include("rodape.php"); ?>