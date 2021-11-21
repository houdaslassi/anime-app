<template>
<div class="home">
  <hero/>
  <!-- animes -->
   <div class="container animes">
     <div id="anime-grid" class="anime-grid">
       <div class="anime" v-for="(anime,index) in animes" :key="index">
         <div class="anime-img">
           <img :src="`https://image.tmdb.org/t/p/w500/${anime.poster_path}`" alt="">
           <p class="review">{{ anime.vote_average }}</p>
           <p class="overview">{{ anime.overview }}</p>
         </div>
         <div class="info">
           <div class="title">{{ anime.title.slice(0,25) }} <span v-if="anime.title.length > 25">...</span></div>
           <p class="release">
             Released :
             
           </p>
           <NuxtLink class="button button-light" :to="{ name: 'animes-animeid', params :{animeid : animeid}}">Get More Infos</NuxtLink>
         </div>
       </div>
     </div>
   </div>
  <!-- animes -->
</div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
     return {
       animes : []
     }
  },
  async fetch(){
    await this.getAnimes();
  },
  methods : {
    async getAnimes(){
      const data = axios.get(
        'https://api.themoviedb.org/3/movie/now_playing?api_key=37ed43a4f8eaa2abd75f9283692947bc&language=en-US&page=1'
      )
      const result = await data
      result.data.results.forEach(anime => {
        this.animes.push(anime)
      });
      console.log(this.animes)
    }
  }
  }
</script>
