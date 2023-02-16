<script>
import axios from 'axios';

export default {

  mounted() {

    axios.get('http://localhost:8000/api/v1/movie/all')
         .then(res => {

            const data = res.data;
            const success = data.success;
            const movies = data.response;

            console.log(movies);
         })
         .catch(err => console.error(err));
  }
};

</script>


<template>
  
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
