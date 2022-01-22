<template>
  <div>
    <header>
      <h1 class="text-danger text-center">Welcome Vue</h1>
    </header>

    <!-- MAIN CONTENT -->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3">
          <Post v-for="post in postsList" :key="post.id" :post="post"></Post>
      </div>
    </div>
  </div>
</template>

<script>
import Post from "./partials/Post.vue";

export default {
  name: "App",
  components: {
    Post,
  },
  data() {
    return {
      postsList: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      this.postsList = resp.data;
    });
  },
};
</script>

<style>
</style>