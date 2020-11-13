<template>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>
                        <h2>Cadastro de Aluno</h2>
                        <form @submit.prevent="handleSubmit">
                            <div class="form-group">
                                <label for="nome_aluno">Nome do Aluno</label>
                                <input type="text" v-model="dados.nome_aluno" id="nome_aluno" name="nome_aluno" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.nome_aluno.$error }" />
                                <div v-if="submitted && !$v.dados.nome_aluno.required" class="invalid-feedback">Nome do Aluno é Obrigatório</div>
                            </div>
                            <div class="form-group">
                                <label for="data_nascimento">Data Nascimento</label>
                                <input type="text" v-model="dados.data_nascimento" id="data_nascimento" name="data_nascimento" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.data_nascimento.$error }" />
                                <div v-if="submitted && !$v.dados.data_nascimento.required" class="invalid-feedback">Data Nascimento é obrigatório</div>
                                <div v-if="submitted && !$v.user.data_nascimento.isValidData" class="invalid-feedback">Data Nascimento Invalido</div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Série Ingresso:</label>
                                    <select class='form-control' v-model="dados.serie_ingresso" id="serie_ingresso" name="serie_ingresso">
                                      <option value=''>Selecione</option>
                                      <option v-for='serie in series' :value='serie.id'>{{ serie.serie_ingresso }}</option>
                                    </select>
                                    
                                </div>
                              </div> 
                            </div>

                            <div class="form-group">
                                <label for="nome_responsavel">Nome da mãe</label>
                                <input type="text" v-model="dados.nome_responsavel" id="nome_responsavel" name="nome_responsavel" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.nome_responsavel.$error }" />
                                <div v-if="submitted && !$v.dados.nome_responsavel.required" class="invalid-feedback">Nome da Mãe é Obrigatório</div>
                            </div>

                            <div class="form-group">
                                <label for="cpf_responsavel">CPF Mãe</label>
                                <input type="text" v-model="dados.cpf_responsavel" id="cpf_responsavel" name="cpf_responsavel" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.cpf_responsavel.$error }" />
                                <div v-if="submitted && !$v.dados.cpf_responsavel.required" class="invalid-feedback">CPF da Mãe é Obrigatório</div>
                                <div v-if="submitted && !$v.dados.cpf_responsavel.numeric" class="invalid-feedback">Digitar apenas numeros</div>
                               
                            </div>

                            <div class="form-group">
                                <label for="dia_vencimento">Dia Pagamento</label>
                                <input type="text" v-model="dados.dia_vencimento" id="dia_vencimento" name="dia_vencimento" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.dia_vencimento.$error }" />
                                <div v-if="submitted && !$v.dados.dia_vencimento.required" class="invalid-feedback">Dia Vencimento é Obrigatório</div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="cep">CEP</label>
                                  <input type="text" @blur="getCep()" v-model="dados.cep" id="cep" name="cep" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.cep.$error }" />
                                  <div v-if="submitted && !$v.dados.cep.required" class="invalid-feedback">CEP é Obrigatório</div>
                                  <div v-if="submitted && !$v.dados.cep.numeric" class="invalid-feedback">Digitar apenas numeros</div>
                                  <div v-if="submitted && !$v.dados.cep.isValidCepLength" class="invalid-feedback">Tamanho Invalido</div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="rua">Rua</label>
                                  <input type="text" v-model="dados.rua" id="rua" name="rua" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.rua.$error }" />
                                  <div v-if="submitted && !$v.dados.rua.required" class="invalid-feedback">Rua é Obrigatório</div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="numero">Numero</label>
                                  <input type="text" v-model="dados.numero" id="numero" name="numero" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.numero.$error }" />
                                  <div v-if="submitted && !$v.dados.numero.required" class="invalid-feedback">Número é Obrigatório</div>
                                  <div v-if="submitted && !$v.dados.numero.numeric" class="invalid-feedback">Digitar apenas numeros</div>
                                </div>
                              </div>
                            </div>

                             <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="complemento">Complemento</label>
                                  <input type="text" v-model="dados.complemento" id="complemento" name="complemento" class="form-control" />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="bairro">Bairro</label>
                                  <input type="text" v-model="dados.bairro" id="bairro" name="bairro" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.bairro.$error }" />
                                  <div v-if="submitted && !$v.dados.numero.required" class="invalid-feedback">Bairro é Obrigatório</div>
                                  
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="cidade">Cidade</label>
                                  <input type="text" v-model="dados.cidade" id="cidade" name="cidade" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.cidade.$error }" />
                                  <div v-if="submitted && !$v.dados.cidade.required" class="invalid-feedback">Cidade é Obrigatório</div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="estado">Estado</label>
                                  <input type="text" v-model="dados.estado" id="estado" name="estado" class="form-control" :class="{ 'is-invalid': submitted && $v.dados.estado.$error }" />
                                  <div v-if="submitted && !$v.dados.estado.required" class="invalid-feedback">Estado é Obrigatório</div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<div>
  <b-button v-b-modal.modal-1>Launch demo modal</b-button>

  <b-modal id="modal-1" title="Inclusão de Usuario">
    <p class="my-4">Estudande Incluido com sucesso</p>
  </b-modal>
</div>

<script>
    import { required, numeric } from "vuelidate/lib/validators";
    
    const isValidData = (value) => {
        var regex = /^[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}$/g;
        var ardt = value.split('/');
        if(!regex.test(value)){
          return false;
        }else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
          return false;
        else if ( ardt[1]==2) {
          if ((ardt[0]>28)&&((ardt[2]%4)!=0))
            return false;
          if ((ardt[0]>29)&&((ardt[2]%4)==0))
            return false;
        }

       
        return true;
    }
    
    const isValidCepLength = (value) => {
        if(value.length != 8) {
          return false;
        }
        return true;
    }
    
    export default {
        name: "app",
        data() {
            return {
                series: [],
                dados: {
                    nome_aluno: "",
                    data_nascimento: "",
                    nome_responsavel: "",
                    cpf_responsavel: "",
                    dia_vencimento: "",
                    cep: "",
                    rua: "",
                    numero: "",
                    bairro: "",
                    cidade: "",
                    estado: ""
                },
                submitted: false
            };
        },
        validations: {
            dados: {
                nome_aluno: { required },
                data_nascimento: { required },
                nome_responsavel: { required },
                cpf_responsavel: { required, numeric},
                dia_vencimento: { required },
                cep: { required, numeric, isValidCepLength },
                rua: { required },
                numero: { required, numeric },
                bairro: { required },
                cidade: { required },
                estado: { required }
            }
        },
        methods: {
            handleSubmit(e) {
                this.submitted = true;

                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

               
                let uri = 'http://afternoon-brook-71877.herokuapp.com/api/estudante/create';
                this.axios.post(uri, this.dados).then((response) => {
                  this.$router.push({name: 'dados'});
                  if(response.data == 'success') 
                    alert("SUCCESS!! \n\n" + this.dados.nome_aluno + ' incluido com sucesso');
                  else 
                     alert("ERRRO!! \n\n" + this.dados.nome_aluno + ' Não Incluido');
                }).catch((error) => {
                  console.log(error, 'nao funcionou')
                });
            },
           
            getSeries: function(){
              
              axios.get('/api/getSeriesIngresso')
              .then(function (response) {
                  this.series = response.data;
              }.bind(this));
              
            },
            getCep () {
              const url = 'https://viacep.com.br/ws/'+event.currentTarget.value+'/json/'
              this.axios.get(url).then(resp => {
                const data = resp.data
                if (!data.erro) {
                  this.dados.rua = data.logradouro;
                  this.dados.bairro = data.bairro;
                  this.dados.cidade = data.localidade;
                  this.dados.estado = data.uf;
                } else {
                  this.dados.rua = '';
                  this.dados.bairro = '';
                  this.dados.cidade = '';
                  this.dados.estado = '';
                  alert('Cep não encontrado')
                }
              }).catch(error => {
                console.error(error)
              })
          }
        },
        created: function(){
          this.getSeries();
         
          
        }
    };
</script>