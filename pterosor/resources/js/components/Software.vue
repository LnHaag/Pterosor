<template>
    <div class="container pt-4">
         <div class="row justify-content-around">
            <div class='col-7'>
                <br><br><br><h1 class="name">Pterosor's softwares: <br></h1><br><br>
            </div>
            <div class="col-3 mr-5">
                <img class="img-fluid" src="https://www.irsamc.ups-tlse.fr/loos/logo/PTEROSOR.jpg" />
            </div>
        </div>
        <div v-for="software in softwares" :key="software.id"><br><br><br>
            <div class= "row">
                <div class="col-2 softitle">{{software.name}}</div>
                <div class="col-8 softdes">{{software.description}}</div>
                <a v-bind:href=software.html_url  class=" col-1 btn btn-secondary btn-sm p-6 align-self-start" target="_blank" role="button">Go to git</a>
            </div>
         </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                softwares:[],
            }
        },

        created(){

            /* var proxyUrl = 'https://cors-anywhere.herokuapp.com/';
            var targetUrl = 'https://git.irsamc.ups-tlse.fr/api/v1/orgs/pterosor/repos'; */
            
            fetch('https://cors-anywhere.herokuapp.com/https://git.irsamc.ups-tlse.fr/api/v1/orgs/pterosor/repos')
            .then(response=>response.json())
            .then((response)=>(this.softwares=response));          
            console.log(this.softwares);
 
 }
        
    }
</script>
