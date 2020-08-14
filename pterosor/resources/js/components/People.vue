<template>
    <div class="container pt-4">
        <h1> {{people.firstname}} {{people.name}}</h1><br><br>
        <h5> {{people.bio}}</h5>
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