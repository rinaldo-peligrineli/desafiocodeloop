// IndexComponent.vue

<template>
  <div>
      <h1>Alunos</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Inserir Aluno</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID#</th>
                <th>Nome Aluno</th>
                <th>Série Ingresso</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="estudante in estudantes" :key="estudantes.id">
                    <td>{{ estudante.id }}</td>
                    <td>{{ estudante.nome_aluno }}</td>
                    <td>{{ estudante.serie_ingresso }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: estudante.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click="deletePost(estudante.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          estudantes: []
        }
      },
      created() {
      let uri = 'http://localhost/desafiocodeloop/public/api/estudante/list';
      this.axios.get(uri).then(response => {
        this.estudantes = response.data;
      });
    },
    methods: {
      deletePost(id)
      {
        
         let uri = 'http://localhost/desafiocodeloop/public/api/estudante/delete/'+ id;
          this.axios.get(uri)
          .then(response => {
              window.location.href = 'http://localhost/desafiocodeloop/public/api/estudante/create';
          })
      }
    }
  }
</script>