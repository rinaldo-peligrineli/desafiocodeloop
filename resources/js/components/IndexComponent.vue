// IndexComponent.vue

<template>
  <div>
      <h1>Posts</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Inserir Aluno</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>{{ post.nome_aluno }}</td>
                    <td>{{ post.serie_ingresso }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click="deletePost(post.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          posts: []
        }
      },
      created() {
      let uri = 'http://afternoon-brook-71877.herokuapp.com/api/estudante/list';
      this.axios.get(uri).then(response => {
        this.posts = response.data.data;
      });
    },
    methods: {
      deletePost(id)
      {
        alert(id)
         let uri = 'http://afternoon-brook-71877.herokuapp.com/api/estudante/delete/'+ id;
          this.axios.get(uri)
          .then(response => {
              window.location.href = 'http://afternoon-brook-71877.herokuapp.com/create';
          })
      }
    }
  }
</script>