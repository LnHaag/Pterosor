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
        <div v-for="software in softwares" :key="software.id">
            <div class= "">
                <br><br><div class="pubtitle">{{software.name}}</div>
                <div class="pubauthor">{{software.description}}</div>
                <a href="" class="btn btn-secondary btn-sm p-6" role="button">Go to git</a>
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
