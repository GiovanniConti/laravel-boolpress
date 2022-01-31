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
      <div class="row">
        <div class="col d-flex justify-content-center">
          <nav>
            <ul class="pagination">

              <li>
                <!-- Page Back Button -->
                <button
                  class="page-link"
                  @click="getData(currentPage - 1)"
                  :disabled="currentPage === 1"
                >
                  Indietro
                </button>
              </li>

              <li class="page-item"
              v-for="page of lastPage" 
              :key="page"
              :class="{'active' : currentPage === page}"
              >
                <!-- Page Number Button -->
                <button class="page-link" @click="getData(page)">
                  {{ page }}
                </button>
              </li>

              <li>
                <!-- Page Forward Button -->
                <button
                  class="page-link"
                  @click="getData(currentPage + 1)"
                  :disabled="currentPage === lastPage"
                >
                  Avanti
                </button>
              </li>

            </ul>
          </nav>
        </div>
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
      currentPage: 1,
      lastPage: null,
    };
  },
  methods: {
    getData(page = 1) {
      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.postsList = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
      });
    },
  },
  mounted() {
    this.getData();
  },
};
</script>

<style>
</style>