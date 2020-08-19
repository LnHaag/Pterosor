<template>
    <div class="container">
        <div class="pt-4">
             <div class="row justify-content-around">
                <div class='col-7'>
                    <br><br><br><h1 class="name">Pterosor's publications: <br></h1><br><br>
                </div>
                <div class="col-3 mr-5">
                    <img class="img-fluid" src="https://www.irsamc.ups-tlse.fr/loos/logo/PTEROSOR.jpg" />
                </div>
            </div>
            
            <div v-for="publication in publications" :key="publication.arxivId_s">
                <div class= "d-flex flex-row justify-content-between align-items-center pt-6">
                <div class="pubtitle">{{publication.title_s['0']}}</div>
                <a v-bind:href="'https://arxiv.org/pdf/'+publication.arxivId_s" class="btn btn-secondary btn-sm mr-5" role="button">Read</a>
                </div>
                <div class="pubauthor">{{publication.authFullName_s.join()}}</div>
                <div class="pubyear">Publication year: {{publication.publicationDateY_i}}</div><br>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        data(){
            return{
                publications:[],
            }
        },

        created(){

            fetch('https://api.archives-ouvertes.fr/search/?q=europeanProject_t:pterosor&indent=true&fl=label_s,arxivId_s,files_s,title_s,author_s,authFullName_s,journal_s,label_bibtex,doiId_s,publicationDateY_i,publicationDate_tdate&group=false&start=0&rows=10000&fq=docType_s:(ART+OR+COMM+OR+OUV+OR+COUV+OR+DOUV+OR+OTHER+OR+UNDEFINED+OR+REPORT+OR+THESE+OR+HDR)&sort=publicationDate_tdate%20desc',)
            .then(response=>response.json())
            .then(response=>this.publications=response.response.docs);          
            console.log(JSON.stringify(this.publications));
 }}
        

</script>
