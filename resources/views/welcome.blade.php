<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  
   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <style>
  #app{
      background-color:#CFD8DC;      
  }
  </style>
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>   
       <!--<h2 class="text-center">CRUD usando APIREST con Node JS</h2>-->
       <!-- Botón create -->  
       <v-flex class="text-center align-center">
       <v-btn class="mx-2 mt-4"  fab dark color="#00B0FF" @click="newForm()"><v-icon dark>mdi-plus</v-icon></v-btn>           
       </v-flex>              
         
        <v-card class="mx-auto mt-5" color="transparent" max-width="1280" elevation="8">                    
      
        <!-- Tabla y formulario -->
        <v-simple-table class="mt-5">
            <template v-slot:default>
                <thead>
                    <tr class="indigo darken-4">
                        <th class="white--text">ID</th>
                        <th class="white--text">NOMBRE</th>
                        <th class="white--text">EDAD</th>
                        <th class="white--text">GENERO</th>
                        <th class="white--text">LOCACION</th>
                        <th class="white--text">INFECTADO</th>
                        <th class="white--text">PUNTOS</th>
                        <th class="white--text text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="suvirvor in suvirvors" :key="suvirvor.id">
                    <td>@{{ suvirvor.id }}</td>
                    <td>@{{ suvirvor.name }}</td>
                    <td>@{{ suvirvor.age }}</td>
                    <td>@{{ suvirvor.gender }}</td>
                    <td>@{{ suvirvor.latitude+', ' +suvirvor.longitude}}</td>
                    <td>@{{ suvirvor.infected }}</td>
                    <td>@{{ suvirvor.points }}</td>
                    <td>
                        <v-btn 
                            fab 
                            dark 
                            color="#00BCD4" 
                            small 
                            @click="editForm(suvirvor.id, suvirvor.name, suvirvor.age, suvirvor.gender,suvirvor.latitude,suvirvor.longitude,suvirvor.infected,suvirvor.points)">
                                <v-icon>mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn fab 
                            dark 
                            color="#E53935" 
                            small 
                            @click="destroy(suvirvor.id)">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        </v-card>        
      <!-- Componente de Diálogo para create y edit -->
      <v-dialog v-model="dialog" max-width="500">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Sobreviviente</v-card-title>    
          <v-card-text>            
            <v-form>             
              <v-container>
                <v-row>
                  <input v-model="suvirvor.id" hidden></input>
                  <v-col cols="12" md="12">
                    <v-text-field v-model="suvirvor.name" label="Nombre" outlined required>
                        @{{ suvirvor.name }}
                    </v-text-field>
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field 
                    v-model="suvirvor.age" 
                    label="Edad" 
                    type="number" 
                    outlined 
                    onkeypress="return event.charCode >= 48"
                    min="1"
                    required></v-text-field>
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-select
                    v-model="suvirvor.gender" 
                    :items="genders"
                    label="Genero"
                    outlined
                  ></v-select>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field 
                    v-model="suvirvor.latitude" 
                    label="Latitud" 
                    type="number" 
                    outlined 
                    required></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field 
                    v-model="suvirvor.longitude" 
                    label="Longitud" 
                    type="number" 
                    outlined 
                    required></v-text-field>
                  </v-col>
                  <v-col cols="12" md="4">
                    <v-switch
                    v-model="suvirvor.infected"
                    label="Infectado"
                    color="red darken-3"
                    :value="1"
                    hide-details
                    ></v-switch>
                  </v-col>
                  <v-col cols="12" md="12">
                    <v-text-field 
                    v-model="suvirvor.points" 
                    label="Puntos" 
                    type="number" 
                    outlined 
                    onkeypress="return event.charCode >= 48"
                    min="0"
                    required></v-text-field>
                  </v-col>
                </v-row>
              </v-container>            
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog=false" color="blue-grey" dark>Cancelar</v-btn>
            <v-btn @click="store()" type="submit" color="blue darken-2" dark>Guardar</v-btn>
          </v-card-actions>
          </v-form>
        </v-card>
      </v-dialog>
      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.5.7/vuetify.min.js" integrity="sha512-BPXn+V2iK/Zu6fOm3WiAdC1pv9uneSxCCFsJHg8Cs3PEq6BGRpWgXL+EkVylCnl8FpJNNNqvY+yTMQRi4JIfZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>


    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
       data() {
        return { 

            suvirvors: [],
            dialog: false,
            operation: '', 
            genders:[ 'male','female' ],           
            suvirvor:{
                id: null,
                name:'',
                age:'',
                gender:'',
                latitude:'',
                longitude:'',
                infected:'',
                points:'',

            }          
        }
       },
       created(){               
            this.list();
       },  
       mounted(){
            // 
       },
       methods:{          
            //CRUD METHODS
            list:function(){
              axios.get('{{ route("suvirvors.list") }}')
              .then(response =>{
                this.suvirvors = response.data;                   
              })
            },
            create:function(){
                let parametros = {
                    name:this.suvirvor.name, 
                    age:this.suvirvor.age,
                    gender:this.suvirvor.gender, 
                    latitude:this.suvirvor.latitude, 
                    longitude:this.suvirvor.longitude, 
                    infected:this.suvirvor.infected, 
                    points:this.suvirvor.points, 
                };                
                axios.post('{{ route("suvirvors.store")}}', parametros)
                .then(response =>{
                  this.list();
                });     
                this.suvirvor.name="";
                this.suvirvor.age="";
                this.suvirvor.gender="";
            },                        
            edit: function(){
                let parametros = {
                        name:this.suvirvor.name, 
                        age:this.suvirvor.age,
                        gender:this.suvirvor.gender, 
                        latitude:this.suvirvor.latitude, 
                        longitude:this.suvirvor.longitude, 
                        infected:this.suvirvor.infected, 
                        points:this.suvirvor.points, 
                        id:this.suvirvor.id
                    };                            
                let route="{{ url('/api/suvirvors') }}"+'/'+parametros.id;     
                console.log(route);              
                axios.put(route, parametros)                            
                .then(response => {                                
                    this.list();
                })                
                .catch(error => {
                    console.log(error);            
                });
            },
            destroy:function(id){
             Swal.fire({
                title: '¿Confirma eliminar el registro?',   
                confirmButtonText: `Confirmar`,                  
                showCancelButton: true,                          
              }).then((result) => {                
                if (result.isConfirmed) {      
                        let route="{{ url('/api/suvirvors') }}"+'/'+id;    
                      axios.delete(route)
                      .then(response =>{           
                          this.list();
                       });      
                      Swal.fire('¡Eliminado!', '', 'success')
                } else if (result.isDenied) {                  
                }
              });              
            },

            //Buttons && forms
            store:function(){
              if(this.operation=='create'){
                this.create();                
              }
              if(this.operation=='edit'){ 
                this.edit();                           
              }
              this.dialog=false;                        
            }, 
            newForm:function () {
              this.dialog=true;
              this.operation='create';
              this.suvirvor.name='';                           
              this.suvirvor.age='';
              this.suvirvor.gender='';
              this.suvirvor.latitude = '';                      
              this.suvirvor.longitude = '';                      
              this.suvirvor.infected = '';                      
              this.suvirvor.points = '';   
            },
            editForm:function(id, name, age, gender, latitude, longitude, infected, points){
              this.suvirvor.id = id;
              this.suvirvor.name = name;                            
              this.suvirvor.age = age;
              this.suvirvor.gender = gender;                      
              this.suvirvor.latitude = latitude;                      
              this.suvirvor.longitude = longitude;                      
              this.suvirvor.infected = infected;                      
              this.suvirvor.points = points;                      
              this.dialog=true;                            
              this.operation='edit';
            },

       },
    
    });
  </script>
</body>
</html> 