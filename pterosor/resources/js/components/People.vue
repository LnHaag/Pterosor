<template>
    <div class="container pt-4">
        <h1> {{people.firstname}} {{people.name}}</h1><br><br>
        <h5> {{people.bio}}</h5>
        <img src='/home/ln/Pterosor/pterosor/public/storage/people.picture' >    
    </div>

</template>


<script>
    export default {

        data() {
            return{
            people: {},
            person:{},
            }
        },

        created ()
        {
            
            axios.get('http://localhost:8000/api/people/'+this.$route.params.person)
            .then(response=> this.people=response.data);
            
        }

    }
</script>