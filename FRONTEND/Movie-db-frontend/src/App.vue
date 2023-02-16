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
    <div>
      <ul>
        <li v-for="movie in this.moviesList">
          <h1>Movie: {{ movie.name }}</h1>
        </li>
      </ul>
      
    </div>
</template>

<style>

</style>
