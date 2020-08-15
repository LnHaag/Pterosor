<template>
    <div class="container">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
             <tbody v-for="software in softwares" :key="software.id" >
                <tr >
                    <th scope="row"></th>
                    <td>{{software.name}}</td>
                    <td>{{software.description}}</td>
                </tr>
            </tbody>
        </table>
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

           
            
            fetch('https://git.irsamc.ups-tlse.fr/api/v1/orgs/pterosor/repos',{ headers: { 'Access-Control-Allow-Origin': '*'}}  )
            .then(response=>response.json())
            .then((response)=>(this.softwares=response.data));          
            console.log(this.softwares);
 
 }
        
    }
</script>
