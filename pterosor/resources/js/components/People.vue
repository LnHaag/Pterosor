<template>
    <div class="container pt-5">
        <div class="row justify-content-between">
            <div class='col-7'>
                <h1 class="name"> <br>{{people.firstname}} {{people.name}}</h1><br><br>
                <a class="bio"> {{people.bio}}</a>
            </div>
            <div class="col-3"><br><br>
            <img class="img-fluid" v-bind:src="people.picture" />
            </div>
        </div>
        <div class="mt-4">
        <h2 class="listpub">{{people.firstname}} {{people.name}}'s publications:<br><br></h2>
        <div v-for="publication in publications" :key="publication.arxivId_s">
            <div class= "d-flex flex-row justify-content-between align-items-center pr-5">
            <div class="pubtitle">{{publication.title_s['0']}}</div>
            <a v-if ="publication.arxivId_s" v-bind:href="'https://arxiv.org/pdf/'+publication.arxivId_s" class="btn btn-secondary btn-sm" role="button">Read</a>
            <a v-else-if="publication.doiId_s" v-bind:href="'https://dx.doi.org/'+publication.doiId_s" target="_blank" class="btn btn-secondary btn-sm" role="button">Read</a>
           </div> 
            <div class="pubauthor">{{publication.authFullName_s.join()}}</div>
            <div class="pubyear">Publication year: {{publication.publicationDateY_i}} {{publication.doiId_s}}</div><br>
            
        </div>
       </div> 
    </div>

</template>


<script>
    export default {

        data() {
            return{
                people: {},
                publications: {}
                }
            },
        watch: {

            '$route' (to, from){ location.reload();}

        },

       mounted ()
        {
            
            axios.get('/api/people/'+this.$route.params.person)
            .then(response=> this.people=response.data)
            .then(response=>{this.people.picture='/storage/'+this.people.picture;
            var $demande='https://api.archives-ouvertes.fr/search/?wt=json&q=authId_i:('+this.people.HALNumber+')&indent=true&fl=label_s,arxivId_s,files_s,title_s,author_s,authFullName_s,journal_s,label_bibtex,doiId_s,publicationDateY_i&group=false&start=0&rows=10000&fq=docType_s:(ART+OR+COMM+OR+OUV+OR+COUV+OR+DOUV+OR+OTHER+OR+UNDEFINED+OR+REPORT+OR+THESE+OR+HDR)&sort=publicationDateY_i%20desc';
            
            fetch($demande).then(response=>response.json())
            .then(response=>this.publications=response.response.docs); });
            console.log(this.people);  
        
        }

    }
</script>