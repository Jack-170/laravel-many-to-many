<template>


  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 text-center">
              <h1 class="text-danger fw-bolder mb-4">Technologies</h1>

              <form v-if="createFormActive" action=""
                          @submit.prevent="submitNewTechnology">
                  <div>
                      <label for="name">Technology name</label>
                      <br>
                      <input type="text" name="name" id="name" class="mb-2" v-model="newTechnology.name">
                  </div>

                  <div>
                      <label for="description">Technology description</label>
                      <br>
                      <input type="text" name="description" id="description" class="mb-2" v-model="newTechnology.description">
                  </div>
                  <input type="submit" value="Create" class="btn btn-primary" >
              </form>

              <div v-else>
                  <button @click="toggleCreateNewTechnology" class="btn btn-dark my-3">Create New Technology</button>
                  <ul class="list-group">
                      <li class="list-group-item" v-for="technology in technologies" :key="technology.id">
                          <div class="mb-2">
                              <p class="text-danger">Name:</p>
                              <h3>{{ technology.name }}</h3>
                          </div>
                          <div>
                              <p class="text-danger">Description:</p>
                              <h3>{{ technology.description }}</h3>
                          </div>
                      </li>
                  </ul>
              </div>
              <div>
                <ul>
                    <li v-for="link in pageLinks" :key="link">
                        <button
                            class="btn btn-dark my-3"
                            @click="changePage(link.url)"
                            v-html="link.label"
                            :class="link.active ? 'bg-light' : ''"
                        />
                    </li>
                </ul>
            </div>
          </div>
      </div>
  </div>










</template>


<script >
import axios from 'axios';

export default{
  name:'Technologies' ,

  data (){
      return{
          technologies:[],
          currentPage: 1,
          pageLinks: [],
          createFormActive : false,

          newTechnology:{
              name:'',
              description:''
          }
      }
  },
  methods:{

      toggleCreateNewTechnology(){


          this.createFormActive = true;

      },
      submitNewTechnology(){
          axios.post('http://localhost:8000/api/v1/technologies', this.newTechnology)
          .then(res => {
              const data = res.data;

              console.log(data);

              if (data.status == 'succes') {

                this.changePage('http://localhost:8000/api/v1/technologies?page=' + this.currentPage);
                  this.createFormActive = false;
              }


          })
          .catch(err => {
              console.err(err);
          });


      },
      changePage(url){

        axios.get(url)
          .then(res => {
              const data = res.data;

              console.log(data);


              if (data.status == 'succes') {

                  this.currentPage = data.technologies.current_page;
                  this.pageLinks = data.technologies.links;
                  this.technologies = data.technologies.data;
              }
              console.log("technologies: ",(this.technologies));


          })
          .catch(err => {
              console.err(err);
          })

      }

  },
  mounted() { this.changePage('http://localhost:8000/api/v1/technologies'); }
}
</script>


<style scoped>
ul {

    list-style-type: none;
}
button.bg-light {

    background-color: white;
    color: black;
}
</style>
