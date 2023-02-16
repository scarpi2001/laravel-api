<script>
import axios from 'axios';

export default {

  data() {
        return {
            moviesList: [],
        }
  },
  mounted() {

    axios.get('http://localhost:8000/api/v1/movie/all')
         .then(res => {

            const data = res.data;
            const success = data.success;
            const movies = data.response;

            this.moviesList = movies;
         })
         .catch(err => console.error(err));
  }
};

</script>


<template>
    <div class="container">

      <div v-for="movie in this.moviesList">
        <h2>Movie: {{ movie.name }}</h2>
        <ul>
          <li>Release year: {{ movie.release_year }}</li>
          <li>Cash out: {{ movie.cash_out }}</li>
          <li>Genre: {{ movie.genre.name }}</li>
          <li>Tags: {{ movie.tags.name }}</li>
        </ul>
      </div>

    </div>
</template>

<style lang="scss">
@use "./styles/general" as*;

.container {
  display: flex;
  flex-wrap: wrap;

  div {
    padding: 10px;
    background-color: #fff;
    width: calc(25% - 40px);
    margin: 40px 20px;
    border: 1px solid black;
    border-radius: 15px;
  }
}
</style>
