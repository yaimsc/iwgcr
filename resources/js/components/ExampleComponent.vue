<!-- <template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

 <script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script> -->

<template>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                        <div class="form-group">

                            <label>Select Continent:</label>

                            <select class='form-control' v-model='continent' @change='getContinents()'>

                              <option value='0' >Select Continent</option>

                              <option v-for='data in continents' :value='data.id'>{{ data.name }}</option>

                            </select>

                        </div>

                        
                        <div class="form-group">

                            <label>Select Country:</label>

                            <select class='form-control' v-model='country'>

                              <option value='0' >Select Country</option>

                              <option v-for='data in countries' :value='data.id'>{{ data.name }}</option>

                            </select>

                        </div>


            </div>

        </div>

    </div>

</template>

<script>  

    export default {

        mounted() {

            console.log('Component mounted.')

        },

        data(){

            return {

                continent: 0,

                continents: [], 

                country: 0,

                countries: [],


            }

        },

        methods:{

            getContinents: function(){

              axios.get('/api/getContinents')

              .then(function (response) {

                this.continents = response.data;

              }.bind(this));

         
            },

            getCountries: function() {

                console.log(this.continent)

                axios.get('/api/getCountries',{
                

                 params: {

                   continent_id: this.continent.id

                 }

              }).then(function(response){

                    this.countries = response.data;

                }.bind(this));

            }

        },

        created: function(){

            this.getContinents()

        }

    }

</script>