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

            //var header = {headers:{ 'Access-Control-Allow-Origin': '*', "Content-Type": "application/json"} };
            
            axios.get('https://api.archives-ouvertes.fr/search/?q=europeanProject_t:pterosor&indent=true&fl=label_s,arxivId_s,files_s,title_s,author_s,authFullName_s,journal_s,label_bibtex,doiId_s,publicationDateY_i,publicationDate_tdate&group=false&start=0&rows=10000&fq=docType_s:(ART+OR+COMM+OR+OUV+OR+COUV+OR+DOUV+OR+OTHER+OR+UNDEFINED+OR+REPORT+OR+THESE+OR+HDR)&sort=publicationDate_tdate%20desc')
            .then(response=> this.softwares=response.data);
            
 
 }
        
    }
</script>
