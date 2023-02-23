<script>
import axios from 'axios';

export default {

  data() {
    return {
          movies: [],
          genres: [],
          tags: [],

          new_movie:  {

            tags_id: []
          },

          state:{
            form: false,
          },
        }   
  },
  methods: {
    getMovies() {
      axios.get('http://localhost:8000/api/v1/movie/all')
        .then(res => {

          const data = res.data;
          const success = data.success;

          const movies = data.response.movies;
          const genres = data.response.genres;
          const tags = data.response.tags;

          if (success) {

            this.movies = movies;
            this.genres = genres;
            this.tags = tags;
          }

        })
        .catch(err => console.error(err));
    },

    submitMovie(e) {
      e.preventDefault();

      axios.post("http://localhost:8000/api/v1/movie/store", this.new_movie)
        .then(res => {

          const data = res.data;
          const success = data.success;

          const movie = data.movie;
          console.log('movie', movie);
        
          if (success) {
            this.getMovies();
            this.state.form = false;
          }

        })
        .catch(err => console.error(err));
    }
  },
  mounted() {
    this.getMovies();
  }
};
</script>

<template>

  <form v-if="state.form">
    <label for="name">Name</label>
    <input type="text" name="name" v-model="new_movie.name">
    <label for="release_year">Release year</label>
    <input type="number" name="release_year" v-model="new_movie.release_year">
    <label for="cash_out">Cash out</label>
    <input type="number" name="cash_out" v-model="new_movie.cash_out">
    <label for="genre_id">Genre</label>
    <select name="genre_id" v-model="new_movie.genre_id">
      <option 
        v-for="genre in genres"
        :key="genre.id"
        :value="genre.id">
        {{ genre.name }}
      </option>
    </select>
    <label>Tag</label>
    <div 
      v-for="tag in tags"
      :key="tag.id">
      <input type="checkbox" :value="tag.id" :id="tag.id" v-model="new_movie.tags_id">
      <label :for="tag.id">{{ tag.name }}</label>
    </div>
    <button @click="state.form = false">CANCEL</button>
    <input @click="submitMovie" type="submit" :value="new_movie.id ? 'UPDATE MOVIE: ' + new_movie.id : 'CREATE NEW MOVIE'">
  </form>

  <div v-else class="container">
    <div class="top">
      <button @click="state.form = true">CREATE NEW MOVIE</button>
    </div>
    
    <div class="cards_box">
      <div v-for="movie in this.movies">
        <h2>Movie: {{ movie.name }}</h2>
        <ul>
          <li>Release year: {{ movie.release_year }}</li>
          <li>Cash out: {{ movie.cash_out }}</li>
          <li>Genre: {{ movie.genre.name }}</li>

          <ul class="tags">
            <span>Tags:</span>
            <li v-for="tag in movie.tags">
              {{ tag.name }}
            </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@use "./styles/general" as*;

form {
  width: 500px;
  margin: 100px auto;
}
.container {
  .top {
    background-color: black;
    text-align: center;

    button {
      width: 100px;
      margin: 50px auto;
    }
  }
  
  .cards_box {
  display: flex;
  flex-wrap: wrap;

  div {
    padding: 10px;
    color: #fff;
    background-color: black;
    width: calc(100% / 3 - 40px);
    margin: 40px 20px;
    border-radius: 15px;

    .tags {
      display: flex;
      gap: 5px;
      margin-top: 10px;

      span {
        display: flex;
        align-items: center;
      }

      li {
        padding: 1px 3px;
        border: 1px solid #fff;
        border-radius: 10px;
      }
    }
  }
}
}

</style>
