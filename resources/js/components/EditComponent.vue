<template>
<div class="jumbotron">
  <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
          <div>
            <h1>Edit Aluno</h1>
            <form @submit.prevent="updatePost">
              <div class="form-group">
                    <label for="nome_aluno">Nome do Aluno</label>
                    <input type="text" v-model="user.nome_aluno" id="nome_aluno" name="nome_aluno" class="form-control" :class="{ 'is-invalid': submitted && $v.user.nome_aluno.$error }" />
                    <div v-if="submitted && !$v.user.nome_aluno.required" class="invalid-feedback">Nome do Aluno é Obrigatório</div>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data Nascimento</label>
                    <input type="text" v-model="user.data_nascimento" id="data_nascimento" name="data_nascimento" class="form-control" :class="{ 'is-invalid': submitted && $v.user.data_nascimento.$error }" />
                    <div v-if="submitted && !$v.user.data_nascimento.required" class="invalid-feedback">Data Nascimento é obrigatório</div>
                    <div v-if="submitted && !$v.user.data_nascimento.isValidData" class="invalid-feedback">Data Nascimento Invalido</div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Série Ingresso:</label>
                        <select class='form-control' v-model="user.serie_ingresso" id="serie_ingresso" name="serie_ingresso">
                          <option value=''>Selecione</option>
                          <option v-for='data in series' :value='data.id' :selected = user.serie_ingresso>{{ data.serie_ingresso }}</option>
                        </select>
                        
                    </div>
                  </div> 
                </div>
                <div class="form-group">
                    <label for="nome_responsavel">Nome da mãe</label>
                    <input type="text" v-model="user.nome_responsavel" id="nome_responsavel" name="nome_responsavel" class="form-control" :class="{ 'is-invalid': submitted && $v.user.nome_responsavel.$error }" />
                    <div v-if="submitted && !$v.user.nome_responsavel.required" class="invalid-feedback">Nome da Mãe é Obrigatório</div>
                </div>

                <div class="form-group">
                    <label for="cpf_responsavel">CPF Mãe</label>
                    <input type="text" v-model="user.cpf_responsavel" id="cpf_responsavel" name="cpf_responsavel" class="form-control" :class="{ 'is-invalid': submitted && $v.user.cpf_responsavel.$error }" />
                    <div v-if="submitted && !$v.user.cpf_responsavel.required" class="invalid-feedback">CPF da Mãe é Obrigatório</div>
                    <div v-if="submitted && !$v.user.cpf_responsavel.numeric" class="invalid-feedback">Digitar apenas numeros</div>
                    
                </div>

                <div class="form-group">
                    <label for="dia_vencimento">Dia Pagamento</label>
                    <input type="text" v-model="user.dia_vencimento" id="dia_vencimento" name="dia_vencimento" class="form-control" :class="{ 'is-invalid': submitted && $v.user.dia_vencimento.$error }" />
                    <div v-if="submitted && !$v.user.dia_vencimento.required" class="invalid-feedback">Dia Vencimento é Obrigatório</div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cep">CEP</label>
                      <input type="text" @blur="getCep()" v-model="user.cep" id="cep" name="cep" class="form-control" :class="{ 'is-invalid': submitted && $v.user.cep.$error }" />
                      <div v-if="submitted && !$v.user.cep.required" class="invalid-feedback">CEP é Obrigatório</div>
                      <div v-if="submitted && !$v.user.cep.numeric" class="invalid-feedback">Digitar apenas numeros</div>
                      <div v-if="submitted && !$v.user.cep.isValidCepLength" class="invalid-feedback">Tamanho Invalido</div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="rua">Rua</label>
                      <input type="text" v-model="user.rua" id="rua" name="rua" class="form-control" :class="{ 'is-invalid': submitted && $v.user.rua.$error }" />
                      <div v-if="submitted && !$v.user.rua.required" class="invalid-feedback">Rua é Obrigatório</div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="numero">Numero</label>
                      <input type="text" v-model="user.numero" id="numero" name="numero" class="form-control" :class="{ 'is-invalid': submitted && $v.user.numero.$error }" />
                      <div v-if="submitted && !$v.user.numero.required" class="invalid-feedback">Número é Obrigatório</div>
                      <div v-if="submitted && !$v.user.numero.numeric" class="invalid-feedback">Digitar apenas numeros</div>
                    </div>
                  </div>
                </div>

                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="complemento">Complemento</label>
                      <input type="text" v-model="user.complemento" id="complemento" name="complemento" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="bairro">Bairro</label>
                      <input type="text" v-model="user.bairro" id="bairro" name="bairro" class="form-control" :class="{ 'is-invalid': submitted && $v.user.bairro.$error }" />
                      <div v-if="submitted && !$v.user.numero.required" class="invalid-feedback">Bairro é Obrigatório</div>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cidade">Cidade</label>
                      <input type="text" v-model="user.cidade" id="cidade" name="cidade" class="form-control" :class="{ 'is-invalid': submitted && $v.user.cidade.$error }" />
                      <div v-if="submitted && !$v.user.cidade.required" class="invalid-feedback">Cidade é Obrigatório</div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="estado">Estado</label>
                      <input type="text" v-model="user.estado" id="estado" name="estado" class="form-control" :class="{ 'is-invalid': submitted && $v.user.estado.$error }" />
                      <div v-if="submitted && !$v.user.estado.required" class="invalid-feedback">Estado é Obrigatório</div>
                    </div>
                  </div>
                </div>

              <br />
                <div class="form-group">
                  <button class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>        
</template>

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

      data() {
        return {
          series: [],
          user: {
            nome_aluno: "",
            data_nascimento: "",
            serie_ingresso: "",
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
        }
      },
      validations: {
        user: {
            nome_aluno: { required },
            data_nascimento: { required, isValidData },
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
        updatePost() {
          this.submitted = true;

          // stop here if form is invalid
          this.$v.$touch();
          if (this.$v.$invalid) {
              return;
          }

          let uri = 'http://afternoon-brook-71877.herokuapp.com/api/estudante/update/'+ this.$route.params.id;
          this.axios.get(uri, { params: this.user })
          .then(response => {
              window.location.href = 'http://afternoon-brook-71877.herokuapp.com/api/create';
          })
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
                this.user.rua = data.logradouro;
                this.user.bairro = data.bairro;
                this.user.cidade = data.localidade;
                this.user.estado = data.uf;
              } else {
                this.user.rua = '';
                this.user.bairro = '';
                this.user.cidade = '';
                this.user.estado = '';
                alert('Cep não encontrado')
              }
            }).catch(error => {
              console.error(error)
            })
        }
      },
      
      created: function(){
        this.getSeries();

        let uri = 'http://afternoon-brook-71877.herokuapp.com/api/estudante/edit/'+ this.$route.params.id;
        this.axios.get(uri).then((response) => {
          this.user.nome_aluno = response.data.estudante.nome_aluno;
          this.user.data_nascimento = response.data.estudante.data_nascimento.split('-').reverse().join('/');
          this.user.serie_ingresso = response.data.estudante.serie_ingresso_id;
          this.user.nome_responsavel = response.data.responsavel.nome_responsavel;
          this.user.cpf_responsavel = response.data.responsavel.cpf_responsavel;
          this.user.dia_vencimento = response.data.responsavel.dia_vencimento;

          this.user.cep = response.data.endereco.cep;
          this.user.rua = response.data.endereco.rua;
          this.user.numero = response.data.endereco.numero;
          this.user.bairro = response.data.endereco.bairro;
          this.user.complemento = response.data.endereco.complemento;
          this.user.cidade = response.data.endereco.cidade;
          this.user.estado = response.data.endereco.estado;
          
        });
      }
    }
</script>