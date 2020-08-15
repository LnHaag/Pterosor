<template>
    <div class="container">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Publication Year</th>
                    <th scope="col"></th>
                </tr>
            </thead>
             <tbody v-for="publication in publications" :key="publication.arxivId_s" >
                <tr >
                    <th scope="row">{{ publication.response.docs.title_s}}</th>
                    <td>{{publication.response.docs.authorFullName_s}}</td>
                    <td>{{publication.response.docs.publicationDateY_i}}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                publications:{},
            }
        },

        created(){

            fetch('https://api.archives-ouvertes.fr/search/?q=europeanProject_t:pterosor&indent=true&fl=label_s,arxivId_s,files_s,title_s,author_s,authFullName_s,journal_s,label_bibtex,doiId_s,publicationDateY_i,publicationDate_tdate&group=false&start=0&rows=10000&fq=docType_s:(ART+OR+COMM+OR+OUV+OR+COUV+OR+DOUV+OR+OTHER+OR+UNDEFINED+OR+REPORT+OR+THESE+OR+HDR)&sort=publicationDate_tdate%20desc')
            .then(response=>response.json())
            .then((response)=>(this.publications=response.data));          
            console.log(this.publications);
 }}
        

</script>
